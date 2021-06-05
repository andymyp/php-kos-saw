<?php
session_start();
require_once('config/koneksi.php');
require_once('config/web.php');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

  <link rel="shortcut icon" href="<?= $WEB_URL ?>assets/logos/mobile.svg">

  <title><?= $WEB_TITLE ?></title>

  <!-- FONT -->
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/font/iconsmind-s/css/iconsminds.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/font/simple-line-icons/css/simple-line-icons.css">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/bootstrap-float-label.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/component-custom-switch.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/dore.light.bluenavy.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/main.css">

  <!-- JQUERY -->
  <script src="<?= $WEB_URL ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
</head>

<body id="app-container" class="menu-default show-spinner vertical boxed">

  <!-- NAVBAR -->
  <?php include('components/navbar.php') ?>

  <!-- SIDEBAR MENU -->
  <?php include('components/sidebar.php') ?>

  <!-- PAGES -->
  <?php include('routes/router.php') ?>

  <!-- FOOTER -->
  <?php include('components/footer.php') ?>

  <!-- JS -->
  <script src="<?= $WEB_URL ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/vendor/perfect-scrollbar.min.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/vendor/jquery.autoellipsis.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/vendor/bootstrap-notify.min.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/dore.script.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/scripts.js"></script>
</body>

</html>