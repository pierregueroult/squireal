<?php

$userModel = new \App\Models\User();
$user = $userModel->getFromId($event["owner_id"]);

?>

<article class="w-full rounded-lg p-2 flex flex-col space-y-2 border-maindarkgreen border-2">
  <div class="flex items-center gap-2">
    <img src="<?= base_url("image/blank.webp") ?>" class="h-12 w-12 rounded-full object-cover" />
    <div class="font-main space-y-1">
      <p class="font-semibold text-md leading-none">
        <?= $user["name"] ?>
      </p>
      <p class="text-sm leading-none">
        @
        <?= $user["username"] ?>
      </p>
    </div>
  </div>
  <div id="map-container-<?= $event["event_id"] ?>" class="h-32 w-full rounded-lg"></div>
  <script>
    var map = new mapboxgl.Map({
      container: "map-container-<?= $event["event_id"] ?>",
      style: "mapbox://styles/mapbox/streets-v11",
      center: [<?= $event["longitude"] ?>, <?= $event["latitude"] ?>],
      zoom: 15,
    });

    new mapboxgl.Marker()
      .setLngLat([<?= $event["longitude"] ?>, <?= $event["latitude"] ?>])
      .addTo(map);

  </script>
  <div class="flex font-main text-sm gap-2">
    <button class="bg-maindarkgreen text-white rounded-lg py-1 flex-1">Chatter</button>
    <button class="bg-mainorange text-white rounded-lg py-1 flex-1">Supprimer</button>
  </div>
</article>