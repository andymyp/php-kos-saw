<?php
// SEMUA KOS
$kos = mysqli_query($conn, "SELECT * FROM tb_kos");
$num_kos = mysqli_num_rows($kos);

// KOS PUTRA
$kos_putra = mysqli_query($conn, "SELECT * FROM tb_kos WHERE kategori='Putra'");
$num_kos_putra = mysqli_num_rows($kos_putra);

// KOS PUTRI
$kos_putri = mysqli_query($conn, "SELECT * FROM tb_kos WHERE kategori='Putri'");
$num_kos_putri = mysqli_num_rows($kos_putri);

// KOS CAMPUR
$kos_campur = mysqli_query($conn, "SELECT * FROM tb_kos WHERE kategori='Campur'");
$num_kos_campur = mysqli_num_rows($kos_campur);

// KOS BARU DITAMBAHKAN
$kos_baru = mysqli_query($conn, "SELECT * FROM tb_kos ORDER BY tgl_input DESC LIMIT 6");
?>

<link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/slick.css">
<link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/glide.core.min.css">

<main>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
          <div class="card-body justify-content-between d-flex flex-row align-items-center">
            <div><i class="iconsminds-male mr-2 text-white align-text-bottom d-inline-block"></i>
              <div>
                <p class="lead text-white"><?= $num_kos_putra ?></p>
                <p class="text-small text-white">KOS PUTRA</p>
              </div>
            </div>
            <div>
              <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="5" aria-valuemax="12" data-show-percent="false"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgba(255,255,255,0.2)" stroke-width="4" fill-opacity="0"></path>
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="white" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 175.954;"></path>
                </svg>
                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: white;"><?= $num_kos_putra . '/' . $num_kos ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4 progress-banner">
          <div class="card-body justify-content-between d-flex flex-row align-items-center">
            <div><i class="iconsminds-female mr-2 text-white align-text-bottom d-inline-block"></i>
              <div>
                <p class="lead text-white"><?= $num_kos_putri ?></p>
                <p class="text-small text-white">KOS PUTRI</p>
              </div>
            </div>
            <div>
              <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="4" aria-valuemax="6" data-show-percent="false"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgba(255,255,255,0.2)" stroke-width="4" fill-opacity="0"></path>
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="white" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 100.545;"></path>
                </svg>
                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: white;"><?= $num_kos_putri . '/' . $num_kos ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4 progress-banner"><a href="#" class="card-body justify-content-between d-flex flex-row align-items-center">
            <div><i class="iconsminds-male-female mr-2 text-white align-text-bottom d-inline-block"></i>
              <div>
                <p class="lead text-white"><?= $num_kos_campur ?></p>
                <p class="text-small text-white">KOS CAMPUR</p>
              </div>
            </div>
            <div>
              <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="8" aria-valuemax="10" data-show-percent="false"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgba(255,255,255,0.2)" stroke-width="4" fill-opacity="0"></path>
                  <path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="white" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 60.3271;"></path>
                </svg>
                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: white;"><?= $num_kos_campur . '/' . $num_kos ?></div>
              </div>
            </div>
          </a></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <h5 class="mb-4 mt-4">Kos baru ditambahkan</h5>
      <div class="row mb-4">
        <div class="col-md-12 mb-4 pl-0 pr-0">
          <div class="glide basic">
            <div class="glide__track pb-3" data-glide-el="track">
              <div class="glide__slides">
                <?php $no = 1; while($row = mysqli_fetch_assoc($kos_baru)) { ?>
                <div class="glide__slide">
                  <div class="card flex-row">
                    <div class="position-relative mb-4" style="font-size: 16px;">
                      <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left"><?= $no ?></span>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-user"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2"><?= $row['pemilik'] ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-tag"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2">Kos <?= $row['kategori'] ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-grid"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2">Kamar <?= $row['luas_kamar'] ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-rocket"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2"><?= $row['jarak'] ?> m</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-layers"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2"><?= $row['fasilitas'] ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="simple-icon-location-pin"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2"><?= $row['alamat'] ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-2 text-center" style="line-height: 22px;">
                          <i class="iconsminds-dollar"></i>
                        </div>
                        <div class="col-10">
                          <p class="list-item-heading mb-2">Rp. <?= number_format($row['harga'], 0, '', '.') ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $no++; } ?>
              </div>
            </div>
            <div class="glide__arrows slider-nav" data-glide-el="controls"><button class="glide__arrow glide__arrow--left left-arrow btn btn-link" data-glide-dir="<"><i class="simple-icon-arrow-left"></i></button>
              <div class="glide__bullets slider-dot-container" data-glide-el="controls[nav]"><button class="glide__bullet slider-dot" data-glide-dir="=0"></button> <button class="glide__bullet slider-dot" data-glide-dir="=1"></button> <button class="glide__bullet slider-dot" data-glide-dir="=2"></button>
                <button class="glide__bullet slider-dot" data-glide-dir="=3"></button> <button class="glide__bullet slider-dot" data-glide-dir="=4"></button>
              </div><button class="glide__arrow glide__arrow--right right-arrow btn btn-link" data-glide-dir=">"><i class="simple-icon-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="<?= $WEB_URL ?>assets/js/vendor/slick.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/glide.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/mousetrap.min.js"></script>