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
  <?= view("components/app/link", [
    "size" => "full-icon",
    "color" => "outline",
    "href" => base_url() . "/api/share",
    "content" => lang("Profile.share"),
    "icon" => "share",
  ]) ?>
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
    <?= lang("Profile.posts") ?>
  </h4>
  <div class="flex flex-col gap-4 items-center justify-center">
    <?php if ($posts): ?>
      <?php foreach ($posts as $post): ?>
        <div class="flex flex-col w-full">
          <img src="<?= base_url() . $post["image"] ?>" alt="<?= $post["description"] ?> post"
            class="rounded-lg w-full h-64 object-cover" />
          <p class="font-main font-semibold text-text text-md mt-2">
            <?= $post["description"] ?>
          </p>
          <p class="font-main font-semibold text-text text-md mt-2">
            <?= $post["date"] ?>
          </p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-text font-main text-center">
        <?= lang("Profile.no_posts") ?>
      </p>
    <?php endif; ?>
  </div>
</main>