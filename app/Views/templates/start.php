<!DOCTYPE html>
<html lang=<?= service("request")->getLocale() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <?php // Partie PWA     ?>
  <link rel="manifest" href="<?= base_url() ?>manifest.webmanifest" crossorigin="use-credentials">
  <meta name="theme-color" content="#FE9C4F">
  <link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
  <title>
    SquiReal 🐿️ |
    <?= esc($title) ?>
  </title>
</head>

<body>