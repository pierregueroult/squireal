<div class="flex flex-col gap-2 w-full">
  <div class="w-full h-14 border-2 border-text rounded-xl bg-foreground flex overflow-hidden" id="container-<?= $id ?>">
    <div class="flex-grow pl-4">
      <input type="<?= $type ?>" class="h-full w-full outline-none" id="input-<?= $id ?>" data-valid="false"
        placeholder="<?= lang($placeholder) ?>" required />
    </div>
    <div class="h-14 w-14 flex items-center justify-center border-s-2 border-text bg-red-300 pb-1"
      id="validation-<?= $id ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
        <path d="M18 6 6 18" />
        <path d="m6 6 12 12" />
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-check hidden">
        <path d="M20 6 9 17l-5-5" />
      </svg>
    </div>
  </div>
  <p class="font-main text-sm text-center">
    <?= $legend ?>
  </p>
  <script defer>
    const input = document.getElementById('input-<?= $id ?>');
    const validation = document.getElementById('validation-<?= $id ?>');

    input.addEventListener('input', () => {
      if (input.value.match(<?= $regex ?>)) {
        validation.classList.toggle("bg-green-300", true);
        validation.classList.toggle("bg-red-300", false);
        input.setAttribute("data-valid", "true");
        document.querySelector("#container-<?= $id ?> .lucide-x").classList.toggle("hidden", true);
        document.querySelector("#container-<?= $id ?> .lucide-check").classList.toggle("hidden", false);
      } else {
        validation.classList.toggle("bg-green-300", false);
        validation.classList.toggle("bg-red-300", true);
        input.setAttribute("data-valid", "false");
        document.querySelector("#container-<?= $id ?> .lucide-x").classList.toggle("hidden", false);
        document.querySelector("#container-<?= $id ?> .lucide-check").classList.toggle("hidden", true);
      }
    });
  </script>
</div>