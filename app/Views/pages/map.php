<main class="no-padding fixed inset-0">
    <script src="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css" rel="stylesheet" />
    <div id="map-container" class="w-full h-full absolute inset-0"></div>
    <a href="<?= base_url() . service("request")->getLocale() ?>/app/event/create"
        class="fixed bottom-28 right-8 py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm">
        Créer un événement
    </a>
    <script src="<?= base_url() . 'js/map.js' ?>" defer="true"></script/>
</main>