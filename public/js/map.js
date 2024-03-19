const mapbox_token =
  "pk.eyJ1IjoiZ3Vlcm91bHRwaWVycmUiLCJhIjoiY2xyZ2U3ZWt1MGdmZDJrbnNseGhpeXExcSJ9.Qf8KlrpeCJ7KRt_cZoCmMg";
mapboxgl.accessToken = mapbox_token;

const map = new mapboxgl.Map({
  container: "map-container",
  style: "mapbox://styles/mapbox/streets-v11",
  center: [2.333333, 48.866667], // starting at Paris
  zoom: 11,
});

navigator.geolocation.getCurrentPosition((position) => {
  map.setCenter([position.coords.longitude, position.coords.latitude]);
});

const setMarkers = async () => {
  const response = await fetch(base_url + "/api/event/all");
  const events = await response.json();
  events.forEach((event) => {
    const el = document.createElement("div");
    el.className = "marker";
    el.style.backgroundImage = `url(${base_url}/svg/${event.color}.svg)`;
    el.style.width = "40px";
    el.style.height = "60px";
    el.style.backgroundSize = "100%";
    el.style.backgroundRepeat = "no-repeat";
    el.style.cursor = "pointer";

    new mapboxgl.Marker(el)
      .setLngLat([event.longitude, event.latitude])
      .addTo(map)
      .setPopup(
        new mapboxgl.Popup({ offset: 25 }).setHTML(`<div class="w-48 flex flex-col items-center">
        <h3 class="text-lg font-main font-bold">${event.name}</h3>
        <p class="font-main font-semibold">${event.description}</p>
        <a class="bg-maindarkgreen text-white font-main rounded-lg py-2 px-4 mt-4" href="${base_url}${locale}/app/event/join/${event.event_id}">Rejoindre l'événement</a>
      </div>`),
      );
  });
};

setMarkers();
