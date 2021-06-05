<main>
  <div class="container-fluid disable-text-selection">
    <div class="row">
      <div class="col-12">
        <div class="mb-3">
          <h1 class="page-title d-none">Kos</h1>
          <div class="text-zero top-right-button-container">
            <button type="button" class="btn btn-primary btn-lg top-right-button" data-toggle="modal" data-target="#modal">
              <i class="simple-icon-magnifier mr-2"></i> CARI
            </button>
          </div>
        </div>
        <div>
          <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">Display Options
            <i class="simple-icon-arrow-down align-middle"></i></a>
          <div class="collapse d-md-block" id="displayOptions">
            <div class="d-block d-md-inline-block">
              <h3>CARI KOS YANG KAMU INGINKAN</h3>
            </div>
          </div>
        </div>
        <div class="separator mb-5"></div>
      </div>
    </div>
    
    <div class="row list disable-text-selection" data-check-all="checkAll">
      
      <?php 
      $no = 1;

      if(isset($_POST['cari'])){
        include('controllers/saw.php');

        // RANKS
        rsort($hasil_ranks);
        foreach ($hasil_ranks as $rank){
        ?>

        <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4">
          <div class="card" style="cursor: pointer;">
            <div class="position-relative mb-4" style="font-size: 16px;">
              <span class="badge badge-pill badge-theme-1 position-absolute badge-top-left"><?= $no == 1 ? 'Recommended' : $no ?></span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-user"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2"><?= $rank['pemilik'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-tag"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2">Kos <?= $rank['kategori'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-grid"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2">Kamar <?= $rank['luas_kamar'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-rocket"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2"><?= $rank['jarak'] ?> m</p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-layers"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2"><?= $rank['fasilitas'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="simple-icon-location-pin"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2"><?= $rank['alamat'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-2 text-center" style="line-height: 22px;">
                  <i class="iconsminds-dollar"></i>
                </div>
                <div class="col-10">
                  <p class="list-item-heading mb-2">Rp. <?= number_format($rank['harga'], 0, '', '.') ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          
      <?php $no++;  }
      } else {
        $sql = "SELECT * FROM tb_kos ORDER BY tgl_input DESC";     
        $query = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4">
          <div class="card" style="cursor: pointer;">
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
      <?php 
          $no++; 
        }
      } ?>

    </div>
  </div>
</main>

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" id="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mt-0"><i class="simple-icon-magnifier"></i> Cari kos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" method="post" autocomplete="off">
        <input type="hidden" name="cari" id="cari" value="cari" required />

        <div class="modal-body">
          <div class="form-group row">
            <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
            <div class="col-sm-10">
              <select class="form-control" id="biaya" name="biaya" required>
                <option value="">- Pilih Biaya -</option>
                <?php 
                $bsql = "SELECT * FROM tb_subkriteria WHERE kd_kriteria='C1' ORDER BY id_sub ASC";
                $bquery = mysqli_query($conn, $bsql);

                while($brow = mysqli_fetch_assoc($bquery)){
                  echo '<option value="'.$brow['min_max'].'">'.$brow['subkriteria'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="jarak" class="col-sm-2 col-form-label">Jarak</label>
            <div class="col-sm-10">
              <select class="form-control" id="jarak" name="jarak" required>
                <option value="">- Pilih Jarak -</option>
                <?php 
                $jsql = "SELECT * FROM tb_subkriteria WHERE kd_kriteria='C2' ORDER BY id_sub ASC";
                $jquery = mysqli_query($conn, $jsql);

                while($jrow = mysqli_fetch_assoc($jquery)){
                  echo '<option value="'.$jrow['min_max'].'">'.$jrow['subkriteria'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
            <div class="col-sm-10">
              <select class="form-control" id="fasilitas" name="fasilitas">
                <option value="">- Pilih Fasilitas -</option>
                <?php 
                $fsql = "SELECT * FROM tb_subkriteria WHERE kd_kriteria='C3' ORDER BY id_sub ASC";
                $fquery = mysqli_query($conn, $fsql);

                while($frow = mysqli_fetch_assoc($fquery)){
                  echo '<option value="'.$frow['subkriteria'].'">'.$frow['subkriteria'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="luas_kamar" class="col-sm-2 col-form-label">Luas Kamar</label>
            <div class="col-sm-10">
              <select class="form-control" id="luas_kamar" name="luas_kamar">
                <option value="">- Pilih Luas Kamar -</option>
                <?php 
                $lsql = "SELECT * FROM tb_subkriteria WHERE kd_kriteria='C4' ORDER BY id_sub ASC";
                $lquery = mysqli_query($conn, $lsql);

                while($lrow = mysqli_fetch_assoc($lquery)){
                  echo '<option value="'.$lrow['subkriteria'].'">'.$lrow['subkriteria'].'</option>';
                }
                ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Cari</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>