<main class="no-padding">
  <video id="camera" muted autoplay
    class="fixed inset-0 w-full h-full object-cover object-center z-0 -scale-x-100"></video>
  <div class="fixed inset-0 w-full h-full hidden z-20" id="photo">
    <img src="" alt="" class="fixed inset-0 w-full h-full object-cover object-center z-10 -scale-x-100">
    <div class="flex items-center justify-between w-full h-auto z-20 fixed bottom-8 px-8 gap-4">
      <button class="py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main text-sm text-center" id="close">
        Annuler
      </button>
      <form class="flex-1" method="POST"
        action="<?= base_url() . service("request")->getLocale() . "/app/post/create" ?>">
        <input type="hidden" name="photo" id="photo-input">
        <button class=" py-4 px-6 bg-maindarkgreen rounded-xl text-foreground font-main w-full text-sm text-center"
          id="validate">
          Créer un post
        </button>
      </form>
    </div>
  </div>
  <button
    class="fixed bottom-32 left-1/2 -translate-x-1/2 bg-white rounded-full before:w-[120%] before:h-[120%] before:absolute before:left-[-10%] before:top-[-10%] before:bg-transpaent before:border-white before:border-2 w-24 h-24 before:rounded-full z-10"
    id="capture"></button>
  <script defer src="<?= base_url("/js/camera.js") ?>"></script>
</main>