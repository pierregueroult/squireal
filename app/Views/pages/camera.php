<main class="no-padding">
  <video id="camera" muted autoplay
    class="fixed inset-0 w-full h-full object-cover object-center z-0 -scale-x-100"></video>
  <div class="fixed inset-0 w-full h-full hidden z-50" id="photo">
    <img src="" alt="" class="fixed inset-0 w-full h-full object-cover object-center z-10 -scale-x-100">
    <div class="flex items-center justify-between w-full h-auto z-20 fixed bottom-8 px-8 gap-4">
      <button class="py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm text-center" id="close">
        <?= lang("Camera.back") ?>
      </button>
      <form class="flex-1" method="POST"
        action="<?= base_url() . service("request")->getLocale() . "/app/post/create" ?>">
        <input type="hidden" name="photo" id="photo-input">
        <button class=" py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main w-full text-sm text-center"
          id="validate">
          <?= lang("Camera.create") ?>
        </button>
      </form>
    </div>
  </div>
  <button
    class="fixed bottom-32 left-1/2 -translate-x-1/2 bg-white rounded-full before:w-[120%] before:h-[120%] before:absolute before:left-[-10%] before:top-[-10%] before:bg-transparent before:border-white before:border-2 w-24 h-24 before:rounded-full z-10"
    id="capture"></button>
  <button class="fixed bottom-32 right-16 z-10 bg-transparent text-foreground hidden" id="switch">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      class="w-10 h-10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
      class="lucide lucide-switch-camera">
      <path d="M11 19H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5" />
      <path d="M13 5h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-5" />
      <circle cx="12" cy="12" r="3" />
      <path d="m18 22-3-3 3-3" />
      <path d="m6 2 3 3-3 3" />
    </svg>
  </button>
  <script defer src="<?= base_url("/js/camera.js") ?>"></script>
</main>