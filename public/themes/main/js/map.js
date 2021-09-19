const Distribution = {
    init: function () {
        // code to render map here...
        var map = L.map('map', {
            minZoom: 1,
            maxZoom: 3,
            center: [0, 0],
            zoom: 1,
            crs: L.CRS.Simple
        });
        var w = 2049;
        var h = 3185;
        // var url = "{{ Theme::asset()->url('images/distribution/map.png') }}";
        var url = "themes/main/images/distribution/map.png";
        var southWest = map.unproject([ 0, h], map.getMaxZoom()-1);
        var northEast = map.unproject([ w, 0], map.getMaxZoom()-1);
        var bounds = new L.LatLngBounds( southWest, northEast);
        window.__map = map
    
        L.imageOverlay( url, bounds).addTo(map);
    
        map.setMaxBounds(bounds);
    
        var yx = L.latLng;
    
        var xy = function(x, y) {
            if (L.Util.isArray(x)) {    // When doing xy([x, y]);
                return yx(x[1], x[0]);
            }
            return yx(y, x);  // When doing xy(x, y);
        };
    
        Distribution.getTemplateDistrubition(map)
    
        setTimeout(() => {
            window.__map.setView(new L.LatLng(-630.8, 254), 2)
        }, 300)
        map.on('click', function(e){
            var lt = String(e.latlng.lat),
            lg = String(e.latlng.lng);
            console.log('latitude: '+lt+', Longtitude: '+lg);
        })
    },
    getTemplateDistrubition: function(map) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: window.__distribution ? window.__distribution.ajax : '',
            method: "GET",
            data: {
                city: $('#city_id').val()
            },
            dataType: "json",
            beforeSend: function () {
                $('#branch-list').html("")
                $('#branch-list').addClass('d-none')
                $('.loading').toggleClass('d-none')
            },
            success: function(result, status, xhr) {
                const { data, template } = result.data
                if($('#branch-list')) {
                    $('#branch-list').html(template)
                    $('#branch-list').removeClass('d-none')
                }
                Distribution.handleEventMouse(map)

                window.__distribution = {
                    ...window.__distribution,
                    data
                }
            },
            complete: function () {
                $('.loading').toggleClass('d-none')
            },
        });
    },
    handleEventMouse: function (map) {
        const locateItem = $('.locate_item')
        if (!locateItem) return

        $(".locate_item").each(function() {
            const itemData = $(this).data('item');
            if (!!itemData) {
                Distribution.addMarkerAndContentPopup(map, itemData)
            }
        });
        
        locateItem
            .mouseenter(function () {
                $('.locate_item').removeClass('active')
                $(this).addClass('active')

                const item = $(this).data('item')
                const { popup_info } = item
                $(".leaflet-popup").each(function() {
                    const popup = $(this).find('.branch-popup').data('popup');
                    if (!!popup && popup == popup_info.id) {
                        $(this).remove();
                    }
                });

                if (!!item) {
                    Distribution.addMarkerAndContentPopup(map, item, 'hover')
                }

            })
            .mouseleave(function () {
                $(this).removeClass('active')
            });
    },
    addMarkerAndContentPopup: function (map, item, status = '') {
        const { location, popup_info } = item
        if(location) {
            lat = location.split('/')[0]
            lng = location.split('/')[1]
        }

        if (!!lat && !!lng) {
            map.fitBounds([
                [lat, lng]
            ], { maxZoom: 8 });
            Distribution.createMarketPoint(map, { popup_info, lat, lng }, status)
        }
    },
    createMarketPoint: function (map, { popup_info, lat, lng }, status = '') {
        let popupDetailWrap = '';
        if(popup_info && popup_info.content && (typeof popup_info.content === 'Array' || typeof popup_info.content === 'object')) {
            popup_info.content.forEach(element => {
                let popupDetailItem = `<div class="branch-body-item">`
                element.forEach((el, index) => {
                    if(index == 0) {
                        popupDetailItem += `<p class="info-number font30">${el.value}</p>`
                    }else if(index == 1) {
                        popupDetailItem += `<p class="info-text font15">${el.value}</p>`
                    }
                })
                popupDetailItem += '</div>'
                popupDetailWrap += popupDetailItem
            });
        }

        let popupContent = `<div class="branch-popup" data-popup="${popup_info.id}">
                                <h2 class="branch-name font20">${popup_info.name}</h2>
                                <div class="branch-body">`
                                + popupDetailWrap +
                                `</div>
                                <div class="branch-footer">
                                    <a href="${popup_info.seemore}"><button>${window.__distribution ? window.__distribution.readmore : ''}</button></a>
                                </div>
                            </div>`
        

        var greenIcon = L.icon({
            // iconUrl: "{{ Theme::asset()->url('images/distribution/marker.png') }}",
            iconUrl: "themes/main/images/distribution/marker.png",
            iconSize:     [30, 30], // size of the icon
            iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -25] // point from which the popup should open relative to the iconAnchor
        });

        var marker =  L.marker(new L.LatLng(lat, lng), {icon: greenIcon}).addTo(map).bindPopup(popupContent)
        if(status == 'hover') {
            marker.openPopup()
        }
    },
}
$(document).ready(function() {
    if (document.getElementById('map')) {
        Distribution.init()
        
    }
    $("#city_id").change(function(e) {
        __map.eachLayer((layer) => {
            if(layer['_latlng']!=undefined)
                layer.remove();
        });
        window.__map.setView(new L.LatLng(-630.8, 254), 2)
        Distribution.getTemplateDistrubition(__map)
    });
})