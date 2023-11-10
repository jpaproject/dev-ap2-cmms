@extends('layouts.app')

@section('style')
<!-- Load Leaflet from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://www.domoritz.de/leaflet-locatecontrol/dist/L.Control.Locate.min.css" />

<!-- Load Esri Leaflet from CDN -->
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<link rel="stylesheet" href="https://www.domoritz.de/leaflet-locatecontrol/dist/L.Control.Locate.mapbox.min.css" />

<link rel="stylesheet" href="{{ asset('css/maps.css') }}">
@endsection

@section('content')
<section class="content mt-2 mr-0 ml-0 pl-0 pr-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="map">
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- Load Leaflet from CDN -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.73.0/src/L.Control.Locate.min.js"></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@2.5.3/dist/esri-leaflet.js" integrity="sha512-K0Vddb4QdnVOAuPJBHkgrua+/A9Moyv8AQEWi0xndQ+fqbRfAFd47z4A9u1AW/spLO0gEaiE1z98PK1gl5mC5Q==" crossorigin=""></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<script>
    $(document).ready(function() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                localCoord = position.coords;
                lat = localCoord.latitude;
                long = localCoord.longitude;

                // Map Satellite
                const sattelite = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3']
                });

                // Map Streets
                const streets = L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxNativeZoom:19,
                    maxZoom: 22,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                });

                // Map Topography
                const topography = L.tileLayer('//server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 22,
                    maxNativeZoom: 18,
                });

                // Map Grayscale
                const grayscale = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://cartodb.com/attributions">CartoDB</a>',
                    subdomains: 'abcd',
                    minZoom: 0,
                    maxZoom: 22,
                    maxNativeZoom: 18,
                });

                const map = L.map('map', {
                    center: [lat, long],
                    zoom: 14,
                    zoomControl: false,
                    fullscreenControl: true,
                    layers: [topography, sattelite, streets, grayscale]
                });

                const basemaps = {
                    "<div class='layers-control-img'><img src='{{ asset('img/topography.png') }}'></div> Topography": topography,
                    "<div class='layers-control-img'><img src='{{ asset('img/street.png') }}'></div> Streets": streets,
                    "<div class='layers-control-img'><img src='{{ asset('img/satellite.png') }}'></div> Sattelite": sattelite,
                    "<div class='layers-control-img'><img src='{{ asset('img/grayscale.png') }}'></div> Grayscale": grayscale,
                };

                L.control.layers(basemaps).addTo(map);

                // add marker
                $.getJSON('api/assets', data => {
                    $.each(data, (index, element) => {

                        if (element.parent == '') {
                            const icon = L.icon({
                                iconUrl: `img/location-categories/${ element.icon }`,

                                iconSize:     [35, 35], // size of the icon
                                iconAnchor:   [15, 33], // point of the icon which will correspond to marker's location
                                popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                            });

                            const html = `
                                <div class="card card-bs card-primary br-20 mw-200">
                                    <div class="card-header text-center">
                                        <h6>${element.name}</h6>
                                    </div>
                                    <div class="card-body">
                                        <img src='{{ asset('img/assets/${ element.image }') }}' class="wa">
                                        <p class="text-md mt-2 mb-0"><b>Code:</b>
                                            ${ element.code }
                                        </p>
                                        <p class="text-md mt-0 mb-0"><b>Type:</b>
                                            ${ element.type_asset }
                                        </p>
                                        <p class="text-md mt-0 mb-0"><b>Category:</b>
                                            ${ element.category_asset }
                                        </p>
                                        <div class="text-center mt-2">
                                            <a href="/assets/${ element.id }" class="d-inline-block mx-auto">Show Detail</a>
                                        </div>
                                    </div>
                                </div>
                            `;

                            if (element.latitude != "" && element.longitude != "") {
                                L.marker([parseFloat(element.latitude), parseFloat(element.longitude)], {icon: icon}).on('click', function() { 
                                L.popup()
                                    .setLatLng([parseFloat(element.latitude), parseFloat(element.longitude)])
                                    .setContent(html)
                                    .openOn(map);
                                }).addTo(map); 
                            }                               
                        }
                    })
                })

                // add legend  
                const legend = L.control({ position: "bottomright" });

                legend.onAdd = function(map) {
                    const div = L.DomUtil.create("div", "legend");
                    div.innerHTML += `<h6><b>Information :</b></h6>`;

                    $.getJSON('api/legends', data => {
                        data.data.forEach(element => {
                            div.innerHTML += `
                            <div class="mb-0" >
                                <img src='{{ asset('img/location-categories/${ element.icon }') }}' class="align-self-center mr-1" style="width:20px !important">
                                <p class="d-inline">${element.location_category}</p>
                                <ul>
                                    ${Object.keys(element.location).map(function (keya) {
                                        let li = '';
                                        Object.keys(element.location[keya].assets).map(function (keyb) {
                                            return li += (element.location[keya].assets[keyb].parent_id == null) ? "<li>" + element.location[keya].assets[keyb].name + "</li>" : '';           
                                        }).join("")
                                        return li;      
                                    }).join("")}
                                </ul>
                            </div>
                            `;
                        });
                    })
                                    
                    return div;
                };

                legend.addTo(map);

                lc = L.control.locate({
                    strings: {
                        title: "Show my location!"
                    },
                    initialZoomLevel: 13
                }).addTo(map);
            });
        }
    });
</script>
@endsection