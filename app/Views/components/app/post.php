<?php

$userModel = new \App\Models\User();
$user = $userModel->getFromId($post["userId"]);
?>
<article class="w-full rounded-lg p-2 flex flex-col space-y-2 border-maindarkgreen border-2 bg-foreground">
    <div class="flex items-center gap-2">
        <img src="<?= base_url("image/man1.jpg") ?>" class="h-12 w-12 rounded-full object-cover" />
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
    ) ?>" class="max-h-32 object-cover rounded-lg" />
    <div class="flex font-main text-sm gap-2">
        <button class="bg-maindarkgreen text-white rounded-lg py-1 flex-1">Sauvegarder</button>
        <button class="bg-maindarkgreen text-white rounded-lg py-1 flex-1">Partager</button>
    </div>
</article>