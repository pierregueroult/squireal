<!DOCTYPE html>
<html lang=<?= service("request")->getLocale() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
  <?php // Partie PWA   ?>
  <link rel="manifest" href="<?= base_url() ?>manifest.webmanifest">
  <meta name="theme-color" content="#FE9C4F">
  <title>
    SquiReal 🐿️ |
    <?= esc($title) ?>
  </title>
</head>

<body>