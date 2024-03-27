<main class="flex flex-col lg:grid lg:grid-cols-5 mx-auto" style="max-width: 1400px;">
  <div class="col-span-3 p-8 sm:p-16 md:p-24 lg:p-8 lg:pt-24">
    <h1 class="font-main font-bold text-5xl sm:text-6xl">
      <?= lang("Home.title_start") ?>
      <span class="text-mainorange underline">
        <?= lang("Home.title_highlight") ?>
      </span>
    </h1>
    <p class="font-main font-semibold text-2xl sm:text-3xl mt-16">
      <?= lang("Home.app") ?>
    </p>
    <ul>
      <li class="mt-4 font-main text-xl">
        <span class="font-title text-mainorange font-normal text-4.5xl sm:text-6xl">
          <?= lang("Home.free") ?>
        </span>
        <br>
        <?= lang("Home.free-desc") ?>
      </li>
      <li class="mt-4 font-main text-xl">
        <span class="font-title text-mainorange font-normal text-4.5xl sm:text-6xl">
          <?= lang("Home.engaged") ?>
        </span>
        <br>
        <?= lang("Home.engaged-desc") ?>
      </li>
      <li class="mt-4 font-main text-xl">
        <span class="font-title text-mainorange font-normal text-4.5xl sm:text-6xl">
          <?= lang("Home.community") ?>
        </span>
        <br>
        <?= lang("Home.community-desc") ?>
      </li>
    </ul>
  </div>
  <div class="col-span-2 flex items-center justify-center pb-16">
    <section class="aspect-threequarters w-96 relative" id="carousel">
      <?php foreach ($posts as $post): ?>
        <article
          class="w-full h-full absolute top-0 left-0 border-maindarkgreen border-2 rounded-3xl flex flex-col p-6 bg-foreground transition-all opacity-0 shadow-popdarkgreen">
          <div class="flex items-center gap-4">
            <img src="<?= base_url("image/blank.webp") ?>" class="h-16 w-16 rounded-full object-cover" />
            <div class="font-main space-y-2">
              <p class="text-xl leading-none font-bold">
                <?= $post["name"] ?>

              </p>
              <p class="text-lg leading-none font-semibold">
                @
                <?= $post["username"] ?>
              </p>
            </div>
          </div>
          <img src="<?= base_url("image/upload/" . $post["image"]) ?>"
            class="max-h-48 w-full object-cover rounded-lg my-4" />
          <p class="leading-6 line-clamp-4 flex-1 font-main">
            <?= $post["description"] ?>
          </p>
          <button class="bg-maindarkgreen text-white rounded-lg mt-4 w-full font-main py-4">
            <?= lang("Home.carousel.see_more") ?>
          </button>
        </article>
      <?php endforeach; ?>
    </section>
    <script>
      const carousel = document.getElementById("carousel");
      let current = 0;
      const articles = carousel.children;
      const max = articles.length;
      const next = () => {
        articles[current].classList.remove("opacity-100");
        articles[current].classList.add("opacity-0");
        current = (current + 1) % max;
        articles[current].classList.remove("opacity-0");
        articles[current].classList.add("opacity-100");
      };

      setInterval(next, 2000);
      next();
    </script>
  </div>
</main>