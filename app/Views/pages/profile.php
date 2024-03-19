<header class="flex items-center justify-center px-8 py-6 bg-transparent">
  <h3 class="text-4xl font-title text-mainorange text-center">
    <?= "@" . $user["username"] ?>
  </h3>
</header>
<main class="no-padding px-8 pb-32">
  <h4 class="font-main font-semibold text-text text-lg">
    <?= lang("Profile.public") ?>
  </h4>
  <div class="flex gap-8 justify-center items-center mb-4">
    <div class="w-1/2">
      <img src="<?= base_url() ?>/image/blank.webp" alt="<?= $user["username"] ?> profile picture"
        class="rounded-lg w-40 h-40 object-cover mt-2" />
    </div>
    <div class="w-1/2 flex items-center justify-center">
      <?php if ($badges): ?>
        <div class="relative">
          <?php foreach ($badges as $badge): ?>
            <img src="<?= base_url() . $badge["image"] ?> 
            alt=" <?= $badge["name"] ?> class="w-24 h-24 object-cover absolute" />
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-text font-main text-center">
          <?= lang("Profile.no_badges") ?>
        </p>
      <?php endif; ?>
    </div>
  </div>
  <button class="w-full flex rounded-xl text-lg items-center border-maindarkgreen border-4 p-4 justify-between"
    id="share">
    <span class="font-main text-maindarkgreen font-bold">
      <?= lang("Profile.share") ?>
    </span>
    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path
        d="M6.64551 12.51L13.4755 16.49M13.4655 5.51001L6.64551 9.49001M19.0557 4C19.0557 5.65685 17.7125 7 16.0557 7C14.3988 7 13.0557 5.65685 13.0557 4C13.0557 2.34315 14.3988 1 16.0557 1C17.7125 1 19.0557 2.34315 19.0557 4ZM7.05566 11C7.05566 12.6569 5.71252 14 4.05566 14C2.39881 14 1.05566 12.6569 1.05566 11C1.05566 9.34315 2.39881 8 4.05566 8C5.71252 8 7.05566 9.34315 7.05566 11ZM19.0557 18C19.0557 19.6569 17.7125 21 16.0557 21C14.3988 21 13.0557 19.6569 13.0557 18C13.0557 16.3431 14.3988 15 16.0557 15C17.7125 15 19.0557 16.3431 19.0557 18Z"
        stroke="#297265" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </button>
  <script>
    document.getElementById("share").addEventListener("click", () => {
      navigator.share({
        title: "<?= $user["username"] ?>",
        text: "<?= lang("Profile.share_text") ?>",
        url: "<?= base_url() ?><?= $locale ?>/app/profile/<?= $user["username"] ?>"
      });
    });
  </script>
  <h4 class="font-main font-semibold text-text mt-8 text-lg mb-2">
    <?= lang("Profile.information") ?>
  </h4>
  <div class="flex flex-col gap-2 items-center justify-center">
    <?php
    $fields = [
      ["text" => "Profile.name", "value" => $user["name"]],
      ["text" => "Profile.email", "value" => $user["email"]],
      ["text" => "Profile.phone", "value" => $user["phone"]],
      ["text" => "Profile.password", "value" => "**********"],
    ];

    foreach ($fields as $field): ?>
      <div class="flex flex-col w-full">
        <p class="font-main font-semibold text-text text-md">
          <?= lang($field["text"]) ?>
        </p>
        <form class="flex gap-2 w-full">
          <input type="text" value="<?= strval(
            $field["value"]
          ) ?>" class="flex-1 rounded-lg border border-text px-4 py-2 bg-foreground cursor-not-allowed opacity-70"
            disabled />
          <button type="submit" class="bg-mainorange text-white font-main font-semibold rounded-lg px-3 py-2" disabled>
            <?= lang("Profile.edit") ?>
          </button>
        </form>
      </div>
    <?php endforeach;
    ?>
  </div>
  <h4 class="font-main font-semibold text-text mt-8 text-lg mb-2">
    My events
  </h4>
  <div class="flex flex-col gap-4 items-center justify-center">
    <?php if ($events): ?>
      <script src="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.js"></script>
      <link href="https://api.mapbox.com/mapbox-gl-js/v0.52.0/mapbox-gl.css" rel="stylesheet" />
      <script>
        const mapbox_token = "pk.eyJ1IjoiZ3Vlcm91bHRwaWVycmUiLCJhIjoiY2xyZ2U3ZWt1MGdmZDJrbnNseGhpeXExcSJ9.Qf8KlrpeCJ7KRt_cZoCmMg";
        mapboxgl.accessToken = mapbox_token;
      </script>
      <?php foreach ($events as $event): ?>
        <?= view("components/app/event", ["event" => $event]) ?>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-text font-main text-center">
        <?= lang("Profile.no_events") ?>
      </p>
    <?php endif; ?>
  </div>
  <h4 class="font-main font-semibold text-text mt-8 text-lg mb-2">
    <?= lang("Profile.posts") ?>
  </h4>
  <div class="flex flex-col gap-4 items-center justify-center">
    <?php if ($posts): ?>
      <?php foreach ($posts as $post): ?>
        <?= view("components/app/post", ["post" => $post]) ?>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-text font-main text-center">
        <?= lang("Profile.no_posts") ?>
      </p>
    <?php endif; ?>
  </div>
</main>