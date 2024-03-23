<?php

use App\Models\UserEvent;

?>

<main class="no-padding">
  <?php
  $userId = $_SESSION["user"]["user_id"];

  $userEvent = model(UserEvent::class);
  $events = $userEvent->getEventsFromUser($userId);

  ?>

  <section>
    <?php if (empty ($events)): ?>
      <h2 class="font-main px-4 pt-20 font-semibold">
        Vous n'avez pas d'événements
      </h2>
    <?php else: ?>
      <h2 class="font-main px-4 pt-20 font-semibold">
        Vos événements
      </h2>
      <div class="flex flex-col space-y-3 mt-2 px-8">
        <?php foreach ($events as $event): ?>
          <div class="h-12 flex items-center">
            <div class="h-12 w-12 rounded-full flex items-center justify-center text-white font-bold text-xl">

            </div>
            <div>
              <h4>
                <?= $event["name"] ?>
              </h4>
              <p>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
</main>