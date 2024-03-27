<main class="no-padding">
  <form class="w-full h-auto px-6 mt-2 pb-32" method="POST" enctype="multipart/form-data" id="createEventForm" 7
    action="<?= base_url("api/event/create") ?>">
    <h3 class="font-main pt-20 font-semibold text-xl underline">
      <?= lang("CreateEvent.create_event") ?>
    </h3>
    <div class="flex flex-col gap-2 w-full">
      <label class="font-main font-semibold text-sm pt-2" for="title">
        <?= lang("CreateEvent.title") ?>
      </label>
      <div class="w(-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <input class="h-10 p-2 w-full outline-none" type="text" name="title" id="title" required
          placeholder="Write the title/name of your event here" />
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="description">
        <?= lang("CreateEvent.description") ?>
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <textarea class="h-32 p-2 w-full outline-none" name="description" id="description" required
          placeholder="Write the description of your event here"></textarea>
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="date">
        <?= lang("CreateEvent.date") ?>
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <input class="h-10 p-2 w-full outline-none" type="datetime-local" name="date" id="date" required
          min="<?= date("Y-m-d\TH:i") ?>" max="<?= date("Y-m-d\TH:i", strtotime("+1 year")) ?>" />
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="location">
        <?= lang("CreateEvent.location") ?>
      </label>
      <input type="hidden" name="latitude" id="latitude" required />
      <input type="hidden" name="longitude" id="longitude" required />
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex h-72 overflow-hidden">
        <link href="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js"></script>
        <script
          src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
        <link rel="stylesheet"
          href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
          type="text/css">
        <div id="event-map" class="h-full w-full absolute inset-0"></div>
        <script src="<?= base_url() . 'js/input-map.js' ?>" defer="true">
        </script>
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="pin">
        <?= lang("CreateEvent.pin") ?>
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex flex-wrap overflow-hidden"
        id="pinSelection">
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tl-xl rounded-bl-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin1" value="yellow" required checked />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin1">
            <img src="<?= base_url() . 'svg/yellow.svg' ?>" alt="<?= lang(
                  "CreateEvent.yellow"
                ) ?>" class="object-cover h-full" />
          </label>
        </div>
        <div class="w-1/3 aspect-square bg-foreground flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin2" value="brown" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin2">
            <img src="<?= base_url() . 'svg/brown.svg' ?>" alt="<?=
                  lang("CreateEvent.brown")
                  ?>" class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tr-xl rounded-br-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin3" value="lightgreen" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin3">
            <img src="<?= base_url() . 'svg/lightgreen.svg' ?>" alt="<?= lang("CreateEvent.lightgreen") ?>"
              class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tl-xl rounded-bl-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin4" value="orange" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin4">
            <img src="<?= base_url() . 'svg/orange.svg' ?>" alt="<?=
                  lang("CreateEvent.orange")

                  ?>" class="object-cover h-full" />
          </label>
        </div>
        <div class="w-1/3 aspect-square bg-foreground flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin5" value="darkgreen" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin5">
            <img src="<?= base_url() . 'svg/darkgreen.svg' ?>" alt="<?=
                  lang("CreateEvent.darkgreen") ?>" class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tr-xl rounded-br-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin6" value="lightblue" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin6">
            <img src="<?= base_url() . 'svg/lightblue.svg' ?>" alt="<?=
                  lang("CreateEvent.lightblue")
                  ?>" class="object-cover h-full" />
          </label>
        </div>
      </div>
      <input type="text" name="locale" id="locale" required value="<?= service("request")->getLocale() ?>"
        class="hidden" readonly />
      <button
        class="w-full border-2 border-maindarkgreen bg-maindarkgreen text-foreground rounded-xl p-2 font-semibold mt-4"
        type="submit">
        <?= lang("CreateEvent.create") ?>
      </button>
  </form>
</main>