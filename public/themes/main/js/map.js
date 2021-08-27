const Distribution = {
    // initSearchState: function() {
    //     if(!$('.city')) return
    //     $('.ui.dropdown.city').dropdown({
    //         ignoreDiacritics: true,
    //         sortSelect: true,
    //         fullTextSearch:'exact',
    //     });
    // },
    getTemplateDistrubition: function() {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: window.__distribution.ajax,
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

                window.__distribution = {
                    ...window.__distribution,
                    data
                }
            },
            complete: function () {
                $('.loading').toggleClass('d-none')
            },
        });
    }
}
//Map
const initMap = () => {
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

    var greenIcon = L.icon({
        // iconUrl: "{{ Theme::asset()->url('images/distribution/marker.png') }}",
        iconUrl: "themes/main/images/distribution/marker.png",

        iconSize:     [30, 30], // size of the icon
        iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -25] // point from which the popup should open relative to the iconAnchor
    });

    let popup = `<div class="branch-popup">
                    <h2 class="branch-name font20">thaco an sương</h2>
                    <div class="branch-body">
                        <div class="branch-body-item">
                            <p class="info-number font30">70</p>
                            <p class="info-text font15">Lorem Isum</p>
                        </div>
                        <div class="branch-body-item">
                            <p class="info-number font30">1000</p>
                            <p class="info-text font15">Lorem Isum</p>
                        </div>
                        <div class="branch-body-item">
                            <p class="info-number font30">99%</p>
                            <p class="info-text font15">Lorem Isum</p>
                        </div>
                    </div>
                    <div class="branch-footer">
                        <a href="#"><button>{!! __('Readmore') !!}</button></a>
                    </div>
                </div>`

    let marker = L.marker(new L.LatLng(-630.8, 254), {icon: greenIcon}).addTo(map).bindPopup(popup)
    L.marker(new L.LatLng(-640.8, 300), {icon: greenIcon}).addTo(map).bindPopup(popup)
    L.marker(new L.LatLng(-660.8, 200), {icon: greenIcon}).addTo(map).bindPopup(popup)
    L.marker(new L.LatLng(-650.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)
    L.marker(new L.LatLng(-620.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)

    setTimeout(() => {
        window.__map.setView(new L.LatLng(-630.8, 254), 2)
        // marker.openPopup()
    }, 300)
}
// Distribution.initSearchState()
$(document).ready(function() {
    Distribution.getTemplateDistrubition()
    $("#city_id").change(function(e) {
        Distribution.getTemplateDistrubition()
    });
    initMap();
})