<header
  class="h-24 fixed z-30 top-4 bg-foreground w-full max-w-screen-2xl left-1/2 -translate-x-1/2 flex border-2 rounded-xl border-text shadow-pop items-center justify-between px-8">
  <h3 class="font-title color-text text-4.5xl ">SquiReal</h3>
  <nav class="flex items-center gap-8">
    <ul class="flex items-center gap-">
      <?php

      $items = [
        [
          'name' => 'Header.home',
          'url' => '/',
        ],
        [
          'name' => 'Header.mission',
          'url' => '/mission',
        ],
        [
          'name' => 'Header.topusers',
          'url' => '/topusers',
        ],
      ];

      $locale = service('request')->getLocale();


      foreach ($items as $item) {

        $isActive = "/" . service('request')->uri->getSegment(2) === $item['url'];
        ?>
        <li class="py-2 px-4">
          <a href="<?= base_url() . $locale . $item['url'] ?>"
            class="font-sans text-xl <?= $isActive ? "underline underline-offset-4" : "" ?>">
            <?= lang($item['name']) ?>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>
    <a href="<?= base_url() . $locale . "/download" ?>"
      class="font-sans text-xl shadow-pop border-2 border-text rounded-md py-2 px-4">
      <?= lang('Header.download') ?>
    </a>
  </nav>
</header>