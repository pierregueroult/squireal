<?php

use App\Models\UserEvent;

?>

<main class="no-padding">
  <?php
  $userId = $_SESSION["user"]["user_id"];

  $userEvent = model(UserEvent::class);
  $events = $userEvent->getEventsFromUser($userId);

  $locale = service('request')->getLocale();

  ?>

  <section>
    <?php if (empty($events)): ?>
      <h2 class="font-main px-4 pt-20 font-semibold">
        <?= lang("Chat.no_events") ?>
      </h2>
    <?php else: ?>
      <h2 class="font-main px-4 pt-20 font-semibold">
        <?= lang("Chat.your_events") ?>
      </h2>
      <div class="flex flex-col mt-2 px-8 divide-y divide-mainorange">
        <?php foreach ($events as $event):
          $color = $event["color"];
          ?>
          <a class="font-main p-2 flex items-center gap-4 py-4 justify-between"
            href="<?= base_url("$locale/app/chat/" . $event['event_id']) ?>">
            <div class="flex items-center gap-4 flex-1">
              <img src="<?= base_url("svg/$color.svg") ?>" class="h-12 w-12" />
              <div class="flex flex-col gap-1 text-black">
                <p class="font-semibold text-md leading-none text-black">
                  <?= $event["name"] ?>
                </p>
                <p class="text-sm leading-none text-black truncate max-w-44 sm:max-w-full">
                  <?= $event["description"] ?>
                </p>
              </div>
            </div>
            <div class="items-center justify-center bg-mainorange text-white rounded-lg h-8 w-10 px-2 hidden msm:flex">
              <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M17.2826 17.8552C15.9729 17.5492 14.7058 17.2531 13.4413 16.9575C13.3957 15.3117 14.5827 12.0286 17.4827 10.7307H0.0166329C0.0117094 10.6239 0.00589065 10.5516 0.00589065 10.4788C0.00544306 9.4962 0.0126046 8.51364 7.19303e-05 7.53107C-0.00261363 7.30061 0.069449 7.24523 0.292351 7.24523C5.88773 7.25104 11.4831 7.2497 17.078 7.2497C17.194 7.2497 17.3103 7.2497 17.4263 7.2497C17.428 7.23183 17.4303 7.21397 17.4321 7.1961C17.1711 7.05095 16.907 6.91026 16.6492 6.75931C16.0401 6.4029 15.5558 5.9134 15.1064 5.37299C14.3652 4.48064 13.8871 3.46502 13.6096 2.35115C13.5152 1.97152 13.4816 1.57715 13.4167 1.19038C13.397 1.07247 13.4373 1.01128 13.5568 0.984486C14.6467 0.741077 15.7361 0.494988 16.8256 0.249346C16.9684 0.217189 17.1111 0.184586 17.2866 0.144836C17.3153 0.37976 17.3506 0.583419 17.3631 0.788865C17.4406 2.04209 17.791 3.21581 18.4781 4.26537C19.1723 5.32565 20.1342 6.08937 21.2993 6.59942C22.0897 6.94555 22.9187 7.13134 23.7714 7.23139C23.8371 7.23898 23.9025 7.24925 23.9817 7.26042C23.9866 7.34438 23.9947 7.41763 23.9947 7.49043C23.9956 8.49533 23.9916 9.50022 23.9992 10.5051C24.0005 10.661 23.9589 10.7387 23.8018 10.7597C23.5735 10.7905 23.347 10.837 23.1188 10.8682C22.3534 10.9736 21.6296 11.2166 20.9408 11.5542C19.6651 12.1786 18.7149 13.1375 18.0847 14.4082C17.7696 15.0437 17.5623 15.7154 17.4603 16.4166C17.3918 16.8851 17.343 17.3568 17.2817 17.8552H17.2826Z"
                  fill="white" />
              </svg>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
</main>