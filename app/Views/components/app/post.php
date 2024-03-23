<?php

$userModel = new \App\Models\User();
$user = $userModel->getFromId($post["userId"]);

$postEventModel = new \App\Models\PostEvent();
$event = $postEventModel->getFromPost($post["post_id"]);

?>
<article class="w-full rounded-lg p-2 flex flex-col space-y-2 border-maindarkgreen border-2 bg-foreground">
    <div class="flex items-center gap-2">
        <img src="<?= base_url("image/blank.webp") ?>" class="h-12 w-12 rounded-full object-cover" />
        <div class="font-main space-y-1">
            <p class="font-semibold text-md leading-none">
                <?= $user["name"] ?>
            </p>
            <p class="text-sm leading-none">
                @
                <?= $user["username"] ?>
            </p>
        </div>
    </div>
    <p class="leading-5">
        <?= $post["description"] ?>
    </p>
    <img src="<?= base_url(
        "image/upload/" . $post["image"]
    ) ?>" class="object-cover rounded-lg" />
    <?php
    if (!empty ($event)):
        $color = $event["color"];
        ?>
        <a class="font-main rounded-lg bg-maindarkgreen p-2 flex items-center gap-2"
            href="<?= base_url() . service("request")->getLocale() ?>/app/map?latitude=<?= $event["latitude"] ?>&longitude=<?= $event["longitude"] ?>&zoom=15">
            <img src="<?= base_url("svg/$color.svg") ?>" class="h-12 w-12" />
            <div class="flex flex-col gap-1 text-background">
                <p class="font-semibold text-md leading-none text-background">
                    <?= $event["name"] ?>
                </p>
                <p class="text-sm leading-none text-background">
                    <?= $event["description"] ?>
                </p>
            </div>
        </a>
    <?php endif; ?>
    <?php if (isset ($admin)): ?>
        <div class="flex font-main text-sm gap-2">
            <?php
            $deleteUrl = base_url() . "api/post/delete/" . $post["post_id"] . "?fallback=" . base_url() . service("request")->getLocale() . "/app/profile/";
            ?>
            <a href="<?= $deleteUrl ?>" class="rounded-lg bg-mainorange p-2 flex-1 text-center font-bold">
                Delete
            </a>
        </div>
    <?php endif; ?>
</article>