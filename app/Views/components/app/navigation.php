<nav
  class="fixed inset-x-8 bottom-8 flex justify-center items-center bg-transparent border-2 border-maindarkgreen rounded-xl">
  <ul class="flex justify-center items-center w-full py-2 divide-x-2 divide-maindarkgreen">
    <?php

    $items = [
      "feed" => [
        "path" => "/",
        "title" => "Feed",
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-leaf"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>'
      ],
      "map" => [
        "path" => "/map",
        "title" => "Map",
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" x2="9" y1="3" y2="18"/><line x1="15" x2="15" y1="6" y2="21"/></svg>'
      ],
      "camera" => [
        "path" => "/camera",
        "title" => "Camera",
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>'
      ],

      "chat" => [
        "path" => "/chat",
        "title" => "Chat",
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>'
      ],
    ];

    $locale = service("request")->getLocale();

    foreach ($items as $key => $item):
      $isActive = "/" . service("request")->uri->getSegment(3) === $item["path"];
      ?>
      <li
        class="w-1/4"
      >
        <a href="<?= base_url() . $locale . "/app" . $item["path"] ?>"
          class="flex flex-col items-center justify-center <?= $isActive ? "text-maindarkgreen" : "text-text" ?> hover:text-mainlightgreen"
        >
          <?= $item["icon"] ?>
          <span
            class="text-sm <?= $isActive ? "font-bold" : "font-medium" ?>"
          >
            <?= $item["title"] ?>
          </span>
        </a>
      </li>
      <?php
    endforeach;
    ?>
  </ul>
</nav>