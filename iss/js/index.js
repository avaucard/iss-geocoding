var macarte = null;

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radius of the earth in km
    var dLat = deg2rad(lat2 - lat1); // deg2rad below
    var dLon = deg2rad(lon2 - lon1);
    var a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c; // Distance in km
    return d;
}

function deg2rad(deg) {
    return deg * (Math.PI / 180)
}

var closestUser = (target, users) => {
    var result;
    users.forEach(user => {
        var d = getDistanceFromLatLonInKm(target.latitude, target.longitude, user.latitude, user.longitude)
        if (!result || result.distance > d) {
            result = { distance:d, name:user.name };
        }
    });
    return result;
}

var main = () => {
    var myIcon = L.icon({
        iconUrl: "img/iss.svg",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [-3, -76],
    });
    var myIcon2 = L.icon({
        iconUrl: "img/home.svg",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [-3, -76],
    });

    macarte = L.map('map').setView([iss_position.latitude, iss_position.longitude], 3);
    marker = L.marker([iss_position.latitude, iss_position.longitude], { icon: myIcon }).addTo(macarte);

    users.forEach(user => {
        marker = L.marker([user.latitude, user.longitude], { icon: myIcon2 }).addTo(macarte);
        marker.bindPopup(user.name);
    });

    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);

    var chosenOne = closestUser(iss_position, users);

    document.getElementById('title').innerHTML = "The ISS is currently over : latitude " + iss_position.latitude + " & longitude " + iss_position.longitude;
    document.getElementById('user').innerHTML = "The closest user is : " + chosenOne.name + " (" + Math.round(chosenOne.distance) + "kms)";
}
window.onload = () => main();