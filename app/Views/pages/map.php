<?php

use App\Models\UserEvent;

$userEventModel = model(UserEvent::class);
$events = $userEventModel->getEventsFromUser(session()->get("user")["user_id"]);

$userEvents = [];

foreach ($events as $event) {
    $userEvents[] = $event["event_id"];
}

?>

<main class="no-padding fixed inset-0">
    <script src="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css" rel="stylesheet" />
    <div id="map-container" class="w-full h-full absolute inset-0"></div>
    <a href="<?= base_url() . service("request")->getLocale() ?>/app/event/create"
        class="fixed bottom-28 right-8 py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm">
        Créer un événement
    </a>
    <button id="randomize"
        class="fixed bottom-28 left-8 p-4 bg-maindarkgreen rounded-xl text-foreground font-main text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-dices">
            <rect width="12" height="12" x="2" y="10" rx="2" ry="2" />
            <path d="m17.92 14 3.5-3.5a2.24 2.24 0 0 0 0-3l-5-4.92a2.24 2.24 0 0 0-3 0L10 6" />
            <path d="M6 18h.01" />
            <path d="M10 14h.01" />
            <path d="M15 6h.01" />
            <path d="M18 9h.01" />
        </svg>
    </button>
    <script>
        const base_url = "<?= base_url() ?>";
        const locale = "<?= service("request")->getLocale() ?>";
        const userEvents = <?= json_encode($userEvents) ?>;
    </script>
    <script src="<?= base_url() . 'js/map.js' ?>" defer="true"></script>
</main>