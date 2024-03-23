<?php $locale = service("request")->getLocale(); ?>

<main class="flex justify-center flex-col container mx-auto">
  <section class="flex flex-col items-center mt-8">
    <h1 class="font-title text-5xl text-mainorange text-center w-4/5 lg:w-full">
      Download the SquiReal App now !
    </h1>
    <div class="flex mt-8 gap-4 items-center flex-col sm:flex-row">
      <?php
      $device = service("request")->getUserAgent()->getPlatform();

      if (str_contains($device, "Android")): ?>
        <a class="flex w-48 h-14 bg-black text-white rounded-lg items-center justify-center cursor-not-allowed">
          <div class="mr-3">
            <svg viewBox="30 336.7 120.9 129.2" width="30">
              <path fill="#FFD400"
                d="M119.2,421.2c15.3-8.4,27-14.8,28-15.3c3.2-1.7,6.5-6.2,0-9.7  c-2.1-1.1-13.4-7.3-28-15.3l-20.1,20.2L119.2,421.2z" />
              <path fill="#FF3333"
                d="M99.1,401.1l-64.2,64.7c1.5,0.2,3.2-0.2,5.2-1.3  c4.2-2.3,48.8-26.7,79.1-43.3L99.1,401.1L99.1,401.1z" />
              <path fill="#48FF48" d="M99.1,401.1l20.1-20.2c0,0-74.6-40.7-79.1-43.1  c-1.7-1-3.6-1.3-5.3-1L99.1,401.1z" />
              <path fill="#3BCCFF"
                d="M99.1,401.1l-64.3-64.3c-2.6,0.6-4.8,2.9-4.8,7.6  c0,7.5,0,107.5,0,113.8c0,4.3,1.7,7.4,4.9,7.7L99.1,401.1z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">
              GET IT ON
            </div>
            <div class="text-xl font-semibold font-sans -mt-1">Google Play</div>
          </div>
        </a>
      <?php elseif (str_contains($device, "iPhone") || str_contains($device, "iOS")): ?>
        <a class="flex w-48 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed">
          <div class="mr-3">
            <svg viewBox="0 0 384 512" width="30">
              <path fill="currentColor"
                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">
              Available on
            </div>
            <div class="text-2xl font-semibold font-sans -mt-1">App Store</div>
          </div>
        </a>

      <?php elseif (str_contains($device, "Mac")): ?>
        <a class="flex w-60 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed">
          <div class="mr-3">
            <svg viewBox="0 0 384 512" width="30">
              <path fill="currentColor"
                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">Download on the</div>
            <div class="text-2xl font-semibold font-sans -mt-1">Mac App Store</div>
          </div>
        </a>

      <?php elseif (str_contains($device, "Windows")): ?>

        <a class="flex w-48 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed">
          <div class="mr-3">
            <svg viewBox="0 0 21 21" width="30">
              <path fill="#f35325" d="M0 0h10v10H0z" />
              <path fill="#81bc06" d="M11 0h10v10H11z" />
              <path fill="#05a6f0" d="M0 11h10v10H0z" />
              <path fill="#ffba08" d="M11 11h10v10H11z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">Get it from</div>
            <div class="text-2xl font-semibold font-sans -mt-1">Microsoft</div>
          </div>
        </a>

      <?php endif;
      ?>

      <button
        class="hidden bg-maindarkgreen font-main h-14 px-6 rounded-xl text-lg  items-center justify-center text-foreground font-semibold hover:bg-mainorange transition-colors install-button">
        Download the web app
      </button>
      <script defer src="<?= base_url("js/download.js") ?>"></script>
      <a class="flex bg-maindarkgreen font-main h-14 px-6 rounded-xl text-lg items-center justify-center text-foreground font-semibold hover:bg-mainorange transition-colors"
        href="<?= base_url("$locale/app") ?>">
        Access now !
      </a>
    </div>
    <p class="underline text-center text-maindarkgreen mt-4 cursor-pointer hover:text-mainorange transition-colors">
      Scroll down for more download options
    </p>
  </section>
  <section class="flex items-center mt-16 flex-col">
    <img src="<?= base_url("image/iphone.webp") ?>" alt="App demo on iphone" class="aspect-square"
      style="width: 450px;">
  </section>
  <section
    class="bg-maindarkgreen sm:rounded-xl my-16 border-y-2 sm:shadow-pop border-black sm:border-2 flex flex-col items-center w-fit p-8 mx-auto">
    <div class="rounded-lg bg-background border-2 border-black flex items-center justify-start p-8 w-full gap-8"
      style="max-width: 900px;">
      <?php
      $size = 200;
      $qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=" . $size . "x" . $size . "&data=" . urlencode(base_url("$locale/app")) . "&bgcolor=fefede&color=000000&margin=0&format=svg"
        ?>

      <img src="<?= $qrCode ?>" alt="QR code for the app" class="aspect-square lg:block hidden"
        style="width: <?= $size . 'px' ?>">
      <div>
        <h2 class="font-title text-4xl text-mainorange">

          An application made for mobile
        </h2>
        <p class="text-md text-black mt-2 font-semibold font-sans">
          The SquiReal application is designed to be used on mobile devices. It is available on the App Store and Google
          Play. You can also access it directly from your browser by clicking on the button below.
        </p>
        <div class="flex gap-4 mt-4 lg:scale-[0.8] flex-wrap justify-center" style="transform-origin: left center;">
          <a class="flex w-48 h-14 bg-black text-white rounded-lg items-center justify-center cursor-not-allowed">
            <div class="mr-3">
              <svg viewBox="30 336.7 120.9 129.2" width="30">
                <path fill="#FFD400"
                  d="M119.2,421.2c15.3-8.4,27-14.8,28-15.3c3.2-1.7,6.5-6.2,0-9.7  c-2.1-1.1-13.4-7.3-28-15.3l-20.1,20.2L119.2,421.2z" />
                <path fill="#FF3333"
                  d="M99.1,401.1l-64.2,64.7c1.5,0.2,3.2-0.2,5.2-1.3  c4.2-2.3,48.8-26.7,79.1-43.3L99.1,401.1L99.1,401.1z" />
                <path fill="#48FF48"
                  d="M99.1,401.1l20.1-20.2c0,0-74.6-40.7-79.1-43.1  c-1.7-1-3.6-1.3-5.3-1L99.1,401.1z" />
                <path fill="#3BCCFF"
                  d="M99.1,401.1l-64.3-64.3c-2.6,0.6-4.8,2.9-4.8,7.6  c0,7.5,0,107.5,0,113.8c0,4.3,1.7,7.4,4.9,7.7L99.1,401.1z" />
              </svg>
            </div>
            <div>
              <div class="text-xs">
                GET IT ON
              </div>
              <div class="text-xl font-semibold font-sans -mt-1">Google Play</div>
            </div>
          </a>
          <a class="flex w-48 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed">
            <div class="mr-3">
              <svg viewBox="0 0 384 512" width="30">
                <path fill="currentColor"
                  d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
              </svg>
            </div>
            <div>
              <div class="text-xs">
                Available on
              </div>
              <div class="text-2xl font-semibold font-sans -mt-1">App Store</div>
            </div>
          </a>
          <a class="flex bg-maindarkgreen font-main h-14 px-6 rounded-xl text-lg items-center justify-center text-foreground font-semibold hover:bg-mainorange transition-colors"
            href="<?= base_url("$locale/app") ?>">
            Access now !
          </a>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full mt-8 gap-8">
      <div class="border-2 border-black bg-background rounded-lg w-full h-full p-4 flex flex-col items-center">
        <h4 class="text-center text-2xl font-semibold font-main">Windows</h4>
        <a class="flex w-48 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed mt-4">
          <div class="mr-3">
            <svg viewBox="0 0 21 21" width="30">
              <path fill="#f35325" d="M0 0h10v10H0z" />
              <path fill="#81bc06" d="M11 0h10v10H11z" />
              <path fill="#05a6f0" d="M0 11h10v10H0z" />
              <path fill="#ffba08" d="M11 11h10v10H11z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">Get it from</div>
            <div class="text-2xl font-semibold font-sans -mt-1">Microsoft</div>
          </div>
        </a>
      </div>
      <div class="border-2 border-black bg-background rounded-lg w-full h-full p-4 flex flex-col items-center">
        <h4 class="text-center text-2xl font-semibold font-main">Mac OS</h4>
        <a class="flex w-60 h-14 bg-black text-white rounded-xl items-center justify-center cursor-not-allowed mt-4">
          <div class="mr-3">
            <svg viewBox="0 0 384 512" width="30">
              <path fill="currentColor"
                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z" />
            </svg>
          </div>
          <div>
            <div class="text-xs">Download on the</div>
            <div class="text-2xl font-semibold font-sans -mt-1">Mac App Store</div>
          </div>
        </a>
      </div>
      <div class="border-2 border-black bg-background rounded-lg w-full h-full p-4 flex flex-col items-center">
        <h4 class="text-center text-2xl font-semibold font-main">
          Web App
        </h4>
        <button
          class="hidden bg-maindarkgreen font-main h-14 px-6 rounded-xl text-lg  items-center justify-center text-foreground font-semibold hover:bg-mainorange transition-colors install-button mt-4">
          Download the web app
        </button>
      </div>
    </div>
  </section>
</main>