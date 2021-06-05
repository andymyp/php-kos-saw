<nav class="navbar fixed-top">
  <div class="d-flex align-items-center navbar-left">
    <a href="#" class="menu-button d-none d-md-block">
      <svg class="main" viewBox="0 0 9 17">
        <rect x="0.48" y="0.5" width="7" height="1" />
        <rect x="0.48" y="7.5" width="7" height="1" />
        <rect x="0.48" y="15.5" width="7" height="1" />
      </svg>
      <svg class="sub" viewBox="0 0 18 17">
        <rect x="1.56" y="0.5" width="16" height="1" />
        <rect x="1.56" y="7.5" width="16" height="1" />
        <rect x="1.56" y="15.5" width="16" height="1" />
      </svg>
    </a>
    <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none"><svg viewBox="0 0 26 17">
        <rect x="0.5" y="0.5" width="25" height="1" />
        <rect x="0.5" y="7.5" width="25" height="1" />
        <rect x="0.5" y="15.5" width="25" height="1" />
      </svg>
    </a>
    <a class="ml-3" href="<?= $WEB_URL ?>"><span class="logo-mobile d-none d-xs-block"></span></a>
    <a class="ml-3 d-none d-xs-block" href="<?= $WEB_URL ?>"><b style="font-size: 18px;"><?= $WEB_TITLE ?></b></a>
  </div>
  <a class="navbar-logo" href="<?= $WEB_URL ?>" id="base-url">
    <span class="logo-mobile d-block d-xs-none"></span>
  </a>
  <div class="navbar-right">
    <div class="header-icons d-inline-block align-middle">
      <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
        <i class="simple-icon-size-fullscreen" style="display: inline;"></i>
        <i class="simple-icon-size-actual" style="display: none;"></i>
      </button>
    </div>
    <div class="user d-inline-block">
      <?php if(isset($_SESSION['spk_login'])){ ?>
      <button class="btn btn-secondary p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="name ml-4" style="color: white;"><?= $_SESSION['nama'] ?></span>
        <span><img alt="Profile Picture" src="<?= $WEB_URL ?>assets/img/avatar.png"></span>
      </button>
      <div class="dropdown-menu dropdown-menu-right mt-3">
        <a class="dropdown-item btn-logout" href="javascript:;">Logout</a>
      </div>
      <?php } else { ?>
      <button type="button" class="btn btn-secondary p-0" data-toggle="modal" data-target="#modal-login">
        <span class="name ml-4" style="color: white;">Login</span>
        <span><img alt="Profile Picture" src="<?= $WEB_URL ?>assets/img/avatar.png"></span>
      </button>
      <?php } ?>
    </div>
  </div>
</nav>

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" id="modal-login">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content col-12 p-0" style="background: transparent;">
      <div class="card auth-card">
        <div class="position-relative image-side"></div>
        <div class="form-side">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; top: 5px; right: 10px; font-size: 35px;">
            <span aria-hidden="true">&times;</span>
          </button>
          <h6 class="mb-4">Login</h6>
          <form id="form-login" method="post" autocomplete="off" onsubmit="return false">
            <input class="form-control" type="hidden" name="action" value="login" required>

            <label class="form-group has-float-label mb-4">
              <input class="form-control" type="text" name="username" required>
              <span>Username</span>
            </label> 
            <label class="form-group has-float-label mb-4">
              <input class="form-control" type="password" name="password" required> 
              <span>Password</span>
            </label>
            <div class="d-flex justify-content-between align-items-center">
              <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= $WEB_URL ?>assets/js/vendor/parsley/parsley.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/parsley/parsley-id.js"></script>
<script src="<?= $WEB_URL ?>assets/js/pages/login.js"></script>