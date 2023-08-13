mapboxgl.accessToken = 'pk.eyJ1IjoiZ2VvcmdlbWFnZHk3MTgiLCJhIjoiY2xoc2d1OXZiMHAyMzNvb2F5ZDIyY25zcyJ9.cUJaBCHSAeCKiWZEgb08yg';

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v12',
    center: [31.224,30.058],
    zoom: 12
});

var markers = [
    {
        name: '9 Abou El Feda',
        url: 'https://goo.gl/maps/RqKTqDvWgxpg4Rws6',
        lngLat: [31.215739507082933, 30.065391392775584]
    },
    {
        name: '18 Brazil St',
        url: 'https://goo.gl/maps/nY1PkuRCR1cF76Rs8',
        lngLat: [31.222125545488257, 30.06029732164391]
    },
    {
        name: '3 El Gabalaya St',
        url: 'https://goo.gl/maps/P9wwBZtoQQfz7a6Q7',
        lngLat: [31.21836060412237, 30.05348154477786]
    },
    {
        name: '26 july Street',
        url: 'https://goo.gl/maps/GjZXattzDPKXTkE68',
        lngLat: [31.21946757377471, 30.061320201509506]
    },
    {
        name: '10 Mohy Eldeen Street',
        url: 'https://goo.gl/maps/tVqk4r7Di2uRNScTA',
        lngLat: [31.199545230190395, 30.046548846246168]
    },
    {
        name: '26 Mesaha Square',
        url: 'https://goo.gl/maps/qCHitSicacoatmqi8',
        lngLat: [31.21415566646474, 30.03585007275638]
    },
    {
        name: '77 Mossadak Street',
        url: 'https://goo.gl/maps/nhaonoBi4xFTh1FG8',
        lngLat: [31.201692951355486, 30.038870483101395]
    },
    {
        name: '2 Veni St',
        url: 'https://goo.gl/maps/oj85GatxFff5n3UZ7',
        lngLat: [31.21892346903374, 30.04016996308017]
    },
    {
        name: '22 Algeria Square',
        url: 'https://goo.gl/maps/WkVLvDNZy56zYMbRA',
        lngLat: [31.250335248749035, 29.960350497084494]
    },
    {
        name: '6 EL-Nasr Street',
        url: 'https://goo.gl/maps/eGrk1tMeqk8pM2yd8',
        lngLat: [31.283031453577717, 29.97554706869298]
    },
    {
        name: '2, 9 Street',
        url: 'https://goo.gl/maps/DzaNj1pWYcizmEh88',
        lngLat: [31.25848809169176, 29.960175342562152]
    },
    {
        name: '44 EL-Horeya Square',
        url: 'https://goo.gl/maps/prcvUusUHBnSH8i88',
        lngLat: [31.254036138660513, 29.959747641313268]
    }
    
];

var markerElements = [];

markers.forEach(function(marker) {
    var el = document.createElement('div');
    el.className = 'marker';
    el.addEventListener('click', function() {
        window.open(marker.url, '_blank');
    });
    markerElements.push(new mapboxgl.Marker({color: "#F7455D"})
        .setLngLat(marker.lngLat)
        .setPopup(new mapboxgl.Popup({ offset: 25 })
        .setHTML('<h3>' + marker.name + '</h3><p><a href="' + marker.url + '" target="_blank">View Direction</a></p>'))
        .addTo(map)
        .getElement());
});
var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
    marker: false,
    placeholder: 'Search for a location'
});

map.addControl(geocoder);
var searchParams = new URLSearchParams(window.location.search);
  var searchQuery = decodeURIComponent(searchParams.get('search'));
// Pass the search query to the Mapbox geocoder
geocoder.query(searchQuery);
document.getElementById('search_btn').addEventListener('click', function() {
    geocoder.query(document.getElementById('searchPageId').value);
});

geocoder.on('result', function(ev) {
    var center = ev.result.center;
    map.flyTo({
        center: center,
        zoom: 12
    });

    markerElements.forEach(function(markerElement) {
        markerElement.remove();
    });

    markerElements = [];

    markers.forEach(function(marker) {
    var el = document.createElement('div');
    el.className = 'marker';
    el.addEventListener('click', function() {
        window.open(marker.url, '_blank');
    });
    markerElements.push(new mapboxgl.Marker({color: "#F7455D"})
        .setLngLat(marker.lngLat)
        .setPopup(new mapboxgl.Popup({ offset: 25 })
        .setHTML('<h3>' + marker.name + '</h3><p><a href="' + marker.url + '" target="_blank">View Direction</a></p>'))
        .addTo(map)
        .getElement());

});
});