<link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="<?= $WEB_URL ?>assets/css/vendor/datatables.responsive.bootstrap4.min.css" />

<main>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h1 class="page-title">Admin</h1>
        <div class="top-right-button-container">
          <button class="btn btn-primary btn-sm btn-tambah" type="button">
            Tambah
          </button>
          <div class="btn-group">
            <button class="btn btn-outline-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              EXPORT
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" id="dataTablesCopy" href="javascript:;">Copy</a>
              <a class="dropdown-item" id="dataTablesExcel" href="javascript:;">Excel</a>
              <a class="dropdown-item" id="dataTablesCsv" href="javascript:;">Csv</a>
              <a class="dropdown-item" id="dataTablesPdf" href="javascript:;">Pdf</a>
            </div>
          </div>
        </div>
        <div class="mb-2">
          <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">Display Options
            <i class="simple-icon-arrow-down align-middle"></i></a>
          <div class="collapse dont-collapse-sm" id="displayOptions">
            <div class="d-block d-md-inline-block">
              <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                <input class="form-control" placeholder="Cari" id="searchDatatable" />
              </div>
            </div>
            <div class="float-md-right dropdown-as-select" id="pageCountDatatable">
              <span class="text-muted text-small"></span><button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                10
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="javascript:;">5</a>
                <a class="dropdown-item active" href="javascript:;">10</a>
                <a class="dropdown-item" href="javascript:;">20</a>
              </div>
            </div>
          </div>
        </div>
        <div class="separator"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
        <table id="datatableRows" class="data-table responsive nowrap">
          <thead>
            <tr>
              <th width="20">No.</th>
              <th>Nama</th>
              <th>Username</th>
              <th width="100" class="empty"></th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" id="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mt-0"><i class="simple-icon-plus"></i> Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" method="post" autocomplete="off" onsubmit="return false">
        <input type="hidden" name="action" id="action" value="tambah" required />
        <input type="hidden" name="id" id="id" value="" required />

        <div class="modal-body">
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="password" name="password" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Plugins Js -->
<script src="<?= $WEB_URL ?>assets/js/vendor/datatables.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/jszip/3.1.3/jszip.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/parsley/parsley.min.js"></script>
<script src="<?= $WEB_URL ?>assets/js/vendor/parsley/parsley-id.js"></script>

<!-- PAGES JS -->
<script src="<?= $WEB_URL ?>assets/js/pages/admin.js"></script>