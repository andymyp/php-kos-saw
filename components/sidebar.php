<div class="menu">
  <div class="main-menu">
    <div class="scroll">
      <ul class="list-unstyled">
        <li><a href="<?= $WEB_URL ?>"><i class="iconsminds-home"></i> <span>Home</span></a></li>

        <?php if(isset($_SESSION['spk_login'])){ ?>
        <li><a href="#master"><i class="iconsminds-data-center"></i> Master</a></li>
        <?php } ?>

        <li><a href="<?= $WEB_URL ?>kos"><i class="iconsminds-home-4"></i> Kos</a></li>
      </ul>
    </div>
  </div>
  <div class="sub-menu">
    <div class="scroll">
      <?php if(isset($_SESSION['spk_login'])){ ?>
      <ul class="list-unstyled" data-link="master">
        <li><a href="<?= $WEB_URL ?>master-kriteria"><i class="simple-icon-layers"></i> <span class="d-inline-block">Kriteria</span></span></a></li>
        <li><a href="<?= $WEB_URL ?>master-subkriteria"><i class="simple-icon-list"></i> <span class="d-inline-block">Sub-Kriteria</span></span></a></li>
        <li><a href="<?= $WEB_URL ?>master-kos"><i class="simple-icon-home"></i> <span class="d-inline-block">Kos</span></span></a></li>
        <li><a href="<?= $WEB_URL ?>master-admin"><i class="simple-icon-people"></i> <span class="d-inline-block">Admin</span></span></a></li>
      </ul>
      <?php } ?>
    </div>
  </div>
</div>