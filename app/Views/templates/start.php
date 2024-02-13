<!DOCTYPE html>
<html lang=<?= service('request')->getLocale() ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $styleUrl = base_url() . "css/style.css";
  echo "<link rel='stylesheet' href='$styleUrl'>";
  // echo "<script src='https://cdn.tailwindcss.com'></script>";
  ?>
  <title>
    SquiReal 🐿️ |
    <?= esc($title) ?>
  </title>
  <link rel="manifest" href="<?= base_url() ?>manifest.webmanifest">
</head>

<body>