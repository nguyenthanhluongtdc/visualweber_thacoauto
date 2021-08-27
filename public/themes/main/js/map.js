const Distribution = {
    // initSearchState: function() {
    //     if(!$('.city')) return
    //     $('.ui.dropdown.city').dropdown({
    //         ignoreDiacritics: true,
    //         sortSelect: true,
    //         fullTextSearch:'exact',
    //     });
    // },
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
    
        // var greenIcon = L.icon({
        //     // iconUrl: "{{ Theme::asset()->url('images/distribution/marker.png') }}",
        //     iconUrl: "themes/main/images/distribution/marker.png",
    
        //     iconSize:     [30, 30], // size of the icon
        //     iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
        //     popupAnchor:  [-3, -25] // point from which the popup should open relative to the iconAnchor
        // });
        Distribution.getTemplateDistrubition(map)
    
        // let popup = `<div class="branch-popup">
        //                 <h2 class="branch-name font20">thaco an sương</h2>
        //                 <div class="branch-body">
        //                     <div class="branch-body-item">
        //                         <p class="info-number font30">70</p>
        //                         <p class="info-text font15">Lorem Isum</p>
        //                     </div>
        //                     <div class="branch-body-item">
        //                         <p class="info-number font30">1000</p>
        //                         <p class="info-text font15">Lorem Isum</p>
        //                     </div>
        //                     <div class="branch-body-item">
        //                         <p class="info-number font30">99%</p>
        //                         <p class="info-text font15">Lorem Isum</p>
        //                     </div>
        //                 </div>
        //                 <div class="branch-footer">
        //                     <a href="#"><button>{!! __('Readmore') !!}</button></a>
        //                 </div>
        //             </div>`
    
        // L.marker(new L.LatLng(-630.8, 254), {icon: greenIcon}).addTo(map).bindPopup(popup)
        // L.marker(new L.LatLng(-640.8, 300), {icon: greenIcon}).addTo(map).bindPopup(popup)
        // L.marker(new L.LatLng(-660.8, 200), {icon: greenIcon}).addTo(map).bindPopup(popup)
        // L.marker(new L.LatLng(-650.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)
        // L.marker(new L.LatLng(-620.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)
    
        setTimeout(() => {
            window.__map.setView(new L.LatLng(-630.8, 254), 2)
        }, 300)
    },
    getTemplateDistrubition: function(map) {
        Distribution.removeMarker()
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

        const locationActive = $('.locate_item.active')
        if (locationActive) {
            const dataLocationActive = locationActive.data('item')
            if (dataLocationActive) {
                Distribution.addMarkerAndContentPopup(map, dataLocationActive)
            }
        }

        locateItem
            .mouseenter(function () {
                $('.locate_item').removeClass('active')
                Distribution.removeMarker()

                $(this).addClass('active')
                if (!!$('.leaflet-popup')) {
                    $('.leaflet-popup').remove();
                }

                const item = $(this).data('item')
                if (!!item) {
                    Distribution.addMarkerAndContentPopup(map, item)
                }

            })
            .mouseleave(function () {
                $(this).removeClass('active')
                // Distribution.removeMarker()
            });
    },
    removeMarker: function () {
        if (!!$('.leaflet-popup')) {
            $('.leaflet-popup').remove();
        }
    },
    addMarkerAndContentPopup: function (map, item) {
        if ($(".leaflet-marker-icon")) {
            $(".leaflet-marker-icon").remove()
        }
        const { location, popup_info } = item
        if(location) {
            lat = location.split('/')[0]
            lng = location.split('/')[1]
        }

        if (!!lat && !!lng) {
            map.fitBounds([
                [lat, lng]
            ], { maxZoom: 8 });
            Distribution.createMarketPoint(map, { popup_info, lat, lng })
        }

        // if (!!popup_info.content && popup_info.content instanceof Array && popup_info.content.length > 0) {
        //     popup_info.content.forEach(el => {
        //         if (!!lat && !!lng) {
        //             Distribution.createMarketPoint(map, {
        //                 name: el.name,
        //                 lat: lat,
        //                 lng: lng,

        //             })
        //         }
        //     })
        //     return
        // }
        // Distribution.createMarketPoint(map, { popup_info.name, image, lat, lng })

    },
    createMarketPoint: function (map, { popup_info, lat, lng }) {
        let popupDetailWrap = '';
        popup_info.content.forEach(element => {
            let popupDetailItem = '<div class="branch-body-item">'
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

        let popupContent = `<div class="branch-popup">
                                <h2 class="branch-name font20">${popup_info.name}</h2>
                                <div class="branch-body">`
                                + popupDetailWrap +
                                `</div>
                                <div class="branch-footer">
                                    <a href="#"><button>{!! __('Readmore') !!}</button></a>
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
        marker.openPopup()
        // let icon = new L.Icon.Default();
        // icon.options.shadowSize = [0, 0];
        // let m = L.marker([lat, lng], { icon }).addTo(map)

        // let p = new L.Popup({ autoClose: false, closeOnClick: false })
        //     .setContent(popupContent)
        //     .setLatLng([lat, lng]);
        // m.bindPopup(p).togglePopup();
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