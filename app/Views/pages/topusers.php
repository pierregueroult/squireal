<main>
  <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-screen-lg mx-auto items-end mt-14 px-8 sm:px-0">
    <?php


    if (count($users) < 3) {
      ?>
      <p>
        There are not enough users to display the top 3 users. Invite your friends to join the competition!
      </p>
      <?php
      exit;
    }

    $topThree = [
      $users[2],
      $users[0],
      $users[1]
    ];


    for ($i = 0; $i < 3; $i++):


      ?>

      <div class="flex flex-col gap-4 h-fit">
        <article class="bg-white p-4 shadow-pop border-black rounded-lg border-2 flex flex-col items-center space-y-4">
          <img src="<?= base_url("image/user/upload/" . $topThree[$i]["username"]) . ".webp" ?>"
            alt="<?= $topThree[$i]["username"] ?>" class="aspect-square w-14 md:w-32 object-cover rounded-lg"
            onerror=" this.src='<?= base_url("image/blank.webp") ?>' " />
          <span class="text-center md:text-left">
            <span class="text-maindarkgreen font-semibold">
              <?= '@' . $topThree[$i]["username"] ?>
            </span>
            <span>
              with
            </span>
            <span class="font-semibold text-black">
              <?= $topThree[$i]["points"] ?>
              points
            </span>
          </span>
        </article>
        <div aria-disabled="true"
          class="h-10 <?= $i === 0 ? "bg-[#CD7F32] sm:h-12" : ($i === 1 ? "bg-[#FFD700] sm:h-36" : "bg-[#C0C0C0] sm:h-24") ?> rounded-lg">
        </div>
      </div>
    <?php endfor; ?>
  </section>
  <section class="flex flex-col max-w-screen-md mx-auto space-y-4 my-8 pb-14 px-4 md:px-0">
    <?php for ($i = 3; $i < count($users); $i++):
      ?>
      <article class="bg-foreground shadow-pop border-2 border-black rounded-md p-4 flex gap-4 items-center">
        <img src="<?= base_url("image/user/upload/" . $users[$i]["username"]) . ".webp" ?>"
          alt="<?= $users[$i]["username"] ?>" class=" aspect-square w-14 object-cover rounded-lg"
          onerror=" this.src='<?= base_url("image/blank.webp") ?>' " />
        <span>
          <span class="text-maindarkgreen font-semibold">
            <?= '@' . $users[$i]["username"] ?>
          </span>
          <span>
            with
          </span>
          <span class="font-semibold text-black">
            <?= $users[$i]["points"] ?>
            points
          </span>
        </span>
      </article>
    <?php endfor; ?>
</main>