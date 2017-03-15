/**
 * Created by Kimia on 3/11/2017.
 */

// ellipsis
function ellipsizeTextBox(id) {
    var el = document.getElementsByClassName(id)[0];
    var wordArray = el.innerHTML.split(' ', 55);
    while(el.scrollHeight > el.offsetHeight) {
        wordArray.pop();
        el.innerHTML = wordArray.join(' ') + '...';
    }
}
ellipsizeTextBox("description");

// end of ellipsis

// google maps

// function mapinitialize() {
//     var latlng = new google.maps.LatLng(-33.86938,151.204834);
//     var myOptions = {
//         zoom: 14,
//         center: latlng,
//         scrollwheel: false,
//         scaleControl: false,
//         disableDefaultUI: false,
//         mapTypeId: google.maps.MapTypeId.ROADMAP,
//         // Google Map Color Styles
//         styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},
//             {visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},
//             {visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}
//         ]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
//     };
//     var map = new google.maps.Map(document.getElementById("map"),myOptions);
//
//     var image = "/images/map-pin.png";
//     var image = new google.maps.MarkerImage("/images/map-pin.png", null, null, null, new google.maps.Size(84,30));
//     var marker = new google.maps.Marker({
//         map: map,
//         icon: image,
//         position: map.getCenter()
//     });
//
//     var contentString = '<b>Office</b><br>Streetname 13<br>50000 Sydney';
//     var infowindow = new google.maps.InfoWindow({
//         content: contentString
//     });
//
//     google.maps.event.addListener(marker, 'click', function() {
//         infowindow.open(map,marker);
//     });
//
//
// }
// mapinitialize();

// end of google maps