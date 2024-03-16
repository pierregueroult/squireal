<main class="no-padding">
  <form class="w-full h-auto px-6 mt-2 pb-32" method="POST" enctype="multipart/form-data" id="createEventForm" 7
    action="<?= base_url("/api/event/create") ?>">
    <style>

    </style>
    <h3 class="font-main pt-20 font-semibold text-xl underline">Create a new event :</h3>
    <div class="flex flex-col gap-2 w-full">
      <label class="font-main font-semibold text-sm pt-2" for="title">
        Enter the title/name of your event here :
      </label>
      <div class="w(-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <input class="h-10 p-2 w-full outline-none" type="text" name="title" id="title" required
          placeholder="Write the title/name of your event here" />
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="description">
        Enter the description of your event here :
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <textarea class="h-32 p-2 w-full outline-none" name="description" id="description" required
          placeholder="Write the description of your event here"></textarea>
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="date">
        Enter the date of your event here :
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex overflow-hidden">
        <input class="h-10 p-2 w-full outline-none" type="datetime-local" name="date" id="date" required
          min="<?= date("Y-m-d\TH:i") ?>" max="<?= date("Y-m-d\TH:i", strtotime("+1 year")) ?>" />
      </div>
      <label class="font-main font-semibold text-sm pt-2" for="location">
        Enter the location of your event here :
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
        Chose a pin for your event :
      </label>
      <div class="w-full border-2 border-text rounded-xl bg-foreground flex flex-wrap overflow-hidden"
        id="pinSelection">
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tl-xl rounded-bl-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin1" value="yellow" required checked />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin1">
            <img src="<?= base_url() . 'svg/squireal_marqueur1.svg' ?>" alt="Pin 1" class="object-cover h-full" />
          </label>
        </div>
        <div class="w-1/3 aspect-square bg-foreground flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin2" value="brown" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin2">
            <img src="<?= base_url() . 'svg/squireal_marqueur2.svg' ?>" alt="Pin 2" class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tr-xl rounded-br-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin3" value="lighgreen" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin3">
            <img src="<?= base_url() . 'svg/squireal_marqueur3.svg' ?>" alt="Pin 3" class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tl-xl rounded-bl-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin4" value="orange" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin4">
            <img src="<?= base_url() . 'svg/squireal_marqueur4.svg' ?>" alt="Pin 4" class="object-cover h-full" />
          </label>
        </div>
        <div class="w-1/3 aspect-square bg-foreground flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin5" value="darkgreen" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin5">
            <img src="<?= base_url() . 'svg/squireal_marqueur5.svg' ?>" alt="Pin 5" class="object-cover h-full" />
          </label>
        </div>
        <div
          class="w-1/3 aspect-square bg-foreground rounded-tr-xl rounded-br-xl flex justify-center items-center overflow-hidden">
          <input class="hidden" type="radio" name="pin" id="pin6" value="lightblue" required />
          <label class="w-full h-full flex items-center justify-center scale-90 rounded-xl p-2" for="pin6">
            <img src="<?= base_url() . 'svg/squireal_marqueur6.svg' ?>" alt="Pin 6" class="object-cover h-full" />
          </label>
        </div>
      </div>
      <button
        class="w-full border-2 border-maindarkgreen bg-maindarkgreen text-foreground rounded-xl p-2 font-semibold mt-4"
        type="submit">
        Create the event
      </button>
  </form>
</main>