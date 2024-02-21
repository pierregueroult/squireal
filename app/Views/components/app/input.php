<div class="flex flex-col gap-2 w-full">
  <div class="w-full h-14 border-2 border-text rounded-xl bg-foreground flex overflow-hidden" id="container-<?= $id ?>">
    <div class="flex-grow pl-4">
      <input type="<?= $type ?>" class="h-full w-full outline-none" id="input-<?= $id ?>" <?php if (
  $regex
): ?>data-valid="false"<?php endif; ?>
        placeholder="<?= lang($placeholder) ?>" required />
    </div>
    <div class="h-14 w-14 flex items-center justify-center border-s-2 border-text pb-1 <?= $regex
      ? "bg-red-300"
      : "bg-blue-300" ?>"
      id="validation-<?= $id ?>">
      <?php if ($regex): ?>
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
      <?php endif; ?>
      <?php if ($type === "password"): ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-off hidden"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
      <?php endif; ?>
    </div>
  </div>
  <?php if ($legend !== null): ?>
    <p class="text-text text-xs"><?= lang($legend) ?></p>
  <?php endif; ?>
  <?php if ($regex): ?>
    <script defer>
      const input_<?= $id ?> = document.getElementById('input-<?= $id ?>');
      const validation_<?= $id ?> = document.getElementById('validation-<?= $id ?>');

      input_<?= $id ?>.addEventListener('input', () => {
        if (input_<?= $id ?>.value.match(<?= $regex ?>)) {
          validation_<?= $id ?>.classList.toggle("bg-green-300", true);
          validation_<?= $id ?>.classList.toggle("bg-red-300", false);
          input_<?= $id ?>.setAttribute("data-valid", "true");
          document.querySelector("#container-<?= $id ?> .lucide-x").classList.toggle("hidden", true);
          document.querySelector("#container-<?= $id ?> .lucide-check").classList.toggle("hidden", false);
        } else {
          validation_<?= $id ?>.classList.toggle("bg-green-300", false);
          validation_<?= $id ?>.classList.toggle("bg-red-300", true);
          input_<?= $id ?>.setAttribute("data-valid", "false");
          document.querySelector("#container-<?= $id ?> .lucide-x").classList.toggle("hidden", false);
          document.querySelector("#container-<?= $id ?> .lucide-check").classList.toggle("hidden", true);
        }
      });
    </script>
  <?php endif; ?>
  <?php if ($type === "password"): ?>
    <script defer>
      const validation_<?= $id ?> = document.getElementById('validation-<?= $id ?>');
      const input_<?= $id ?> = document.getElementById('input-<?= $id ?>');

      validation_<?= $id ?>.addEventListener('click', () => {
        if (input_<?= $id ?>.getAttribute("type") === "password") {
          input_<?= $id ?>.setAttribute("type", "text");
          document.querySelector("#container-<?= $id ?> .lucide-eye").classList.toggle("hidden", true);
          document.querySelector("#container-<?= $id ?> .lucide-eye-off").classList.toggle("hidden", false);
        } else {
          input_<?= $id ?>.setAttribute("type", "password");
          document.querySelector("#container-<?= $id ?> .lucide-eye").classList.toggle("hidden", false);
          document.querySelector("#container-<?= $id ?> .lucide-eye-off").classList.toggle("hidden", true);
        }
      });
    </script>
  <?php endif; ?>
</div>