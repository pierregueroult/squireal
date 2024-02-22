<?php

$locale = service('request')->getLocale();

?>
<main class="no-padding overflow-hidden h-100vh">
  <img src="<?= base_url() ?>image/Illustration.png" class="h-1/2 w-full object-cover fixed inset-0" />
  <section class="bg-background h-4/6 w-full fixed bottom-0 left-0 rounded-t-5xl p-8 flex flex-col gap-8">
    <?= view("components/app/logo") ?>
    <?= view("components/app/link", [
      'href' => "",
      'content' => lang('Auth.continueGoogle'),
      'size' => 'full-icon',
      'color' => 'outline',
      'icon' => 'arrow_forward',
      "class" => "cursor-not-allowed"
    ]) ?>
    <div class="flex justify-between items-center">
      <span aria-hidden="true" class="w-5/12 h-px bg-text block"></span>
      <p class="text-center text-text font-main font-semibold">
        <?= lang('Auth.or') ?>
      </p>
      <span aria-hidden="true" class="w-5/12 h-px bg-text block"></span>
    </div>
    <div class="flex flex-col gap-4">
      <?= view("components/app/link", [
        'href' => base_url() . $locale . '/app/auth/login',
        'content' => lang('Auth.signIn'),
        'size' => 'full-icon',
        'color' => 'full',
        'icon' => 'arrow_forward',
        "class" => ""
      ]) ?>
      <?= view("components/app/link", [
        'href' => base_url() . $locale . '/app/auth/register',
        'content' => lang('Auth.register'),
        'size' => 'full-icon',
        'color' => 'full',
        'icon' => 'arrow_forward',
        "class" => ""
      ]) ?>
    </div>
  </section>
</main>