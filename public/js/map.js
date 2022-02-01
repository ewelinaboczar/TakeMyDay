mapboxgl.accessToken = 'pk.eyJ1IjoiZXdlbGluYTE3OSIsImEiOiJja3oxZG52cXkwd3huMnZvMTdvYnA0eDA4In0.6gmnsHuRGUz1QKuj9waY4A';
const cont = String(document.getElementById('mapps').innerText);

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v10',
    center: [19.932061162325112,50.07596237257379],
    zoom: 12
});

if(cont !== 'available'){
    document.querySelector('.map-container').style.display = 'none';
}else{
    fetch("/places").then(function (response){
        return response.json();
    }).then(function (places) {
        places.map(place=>{
            place.coordinates = JSON.parse(place.coordinates);
        });
        displayPlaces(places);
    });
}


function displayPlaces(places){
    for (const feature of places) {
        const el = document.createElement('div');
        el.className = 'marker';


        new mapboxgl.Marker(el)
            .setLngLat(feature.coordinates.point)
            .setPopup(
                new mapboxgl.Popup({ offset: 25 }) // add popups
                    .setHTML(
                        `<h3>${feature.location}</h3><p>${feature.milestone_description}</p>`
                    )
            )
            .addTo(map);
    }
}

