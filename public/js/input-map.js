const mapbox_token =
  "pk.eyJ1IjoiZ3Vlcm91bHRwaWVycmUiLCJhIjoiY2xyZ2U3ZWt1MGdmZDJrbnNseGhpeXExcSJ9.Qf8KlrpeCJ7KRt_cZoCmMg";
mapboxgl.accessToken = mapbox_token;

const map = new mapboxgl.Map({
  container: "event-map",
  style: "mapbox://styles/mapbox/streets-v11",
  center: [1.09932, 49.44313],
  zoom: 2,
});

const geocoder = new MapboxGeocoder({
  accessToken: mapboxgl.accessToken,
  mapboxgl: mapboxgl,
  marker: {
    color: "orange",
  },
  placeholder: "Search for a place",
  scale: 5,
  limit: 5,
});

map.addControl(geocoder);

geocoder.on("result", function (e) {
  const lat = e.result.center[1];
  const lng = e.result.center[0];
  console.log(lat, lng);
  document.getElementById("latitude").value = lat;
  document.getElementById("longitude").value = lng;
});
