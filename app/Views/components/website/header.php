<header
  class="h-16 lg:h-24 fixed z-30 top-4 bg-foreground w-near-full max-w-screen-2xl left-1/2 -translate-x-1/2 flex border-2 rounded-xl border-text shadow-pop items-center justify-between px-8 sm:flex-row-reverse md:flex-row ">
  <button
    class="lg:hidden flex items-center justify-center h-12 w-12 rounded-md bg-foreground text-foreground text-text border-text"
  >
  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
  </button>
  <h3 class="font-title color-text lg:text-4.5xl text-3xl">SquiReal</h3>
  <nav class="hidden md:flex items-center gap-2 lg:gap-8">
    <ul class="flex items-center">
      <?php
      $items = [
        [
          "name" => "Header.home",
          "url" => "/",
        ],
        [
          "name" => "Header.mission",
          "url" => "/mission",
        ],
        [
          "name" => "Header.topusers",
          "url" => "/topusers",
        ],
      ];

      $locale = service("request")->getLocale();

      foreach ($items as $item) {
        $isActive = "/" . service("request")->uri->getSegment(2) === $item["url"]; ?>
        <li class="py-2 px-2 lg:px-4">
          <a href="<?= base_url() . $locale . $item["url"] ?>"
            class="font-sans text-md lg:text-xl <?= $isActive
              ? "underline underline-offset-4"
              : "" ?>">
            <?= lang($item["name"]) ?>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>
    <a href="<?= base_url() . $locale . "/download" ?>"
      class="font-sans text-md lg:text-xl lg:shadow-pop border-2 border-text rounded-md py-1.5 lg:py-2 px-2 lg:px-4">
      <?= lang("Header.download") ?>
    </a>
  </nav>
</header>