<?php
require_once('config/web.php');
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">

  <title>ERROR 404</title>

  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/font/iconsmind-s/css/iconsminds.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/font/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/bootstrap.rtl.only.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/bootstrap-float-label.min.css">
  <link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/main.css">
</head>

<body class="background show-spinner no-footer">
  <div class="fixed-background"></div>
  <main>
    <div class="container">
      <div class="row h-100">
        <div class="col-12 col-md-10 mx-auto my-auto">
          <div class="card auth-card">
            <div class="position-relative image-side"></div>
            <div class="form-side">
              <div class="text-center"><a href="<?= $WEB_URL ?>"><span class="logo-single"></span></a>
                <h6 class="mb-4">Halaman tidak ditemukan!</h6>
                <p class="mb-0 text-muted text-small mb-0">Error code</p>
                <p class="display-1 font-weight-bold mb-5">404</p>
                <button type="button" class="btn btn-primary btn-lg btn-shadow" onclick="window.history.back()">KEMBALI</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="<?= $WEB_URL ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/dore.script.js"></script>
  <script src="<?= $WEB_URL ?>assets/js/scripts.js"></script>
</body>
</html>