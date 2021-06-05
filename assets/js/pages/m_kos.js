$(document).ready(function () {
  var baseURL = $("#base-url").attr("href");

  $("#modal").on("hidden.bs.modal", function () {
    $("#form")[0].reset();
    $("#form").parsley().reset();
  });

  $("body").on("click", ".btn-tambah", function () {
    $(".modal-title").html('<i class="simple-icon-plus"></i> Tambah');
    $("#action").val("tambah");
    $("#id").attr("readonly", false);
    $("#pemilik").attr("readonly", false);
    $("#alamat").attr("readonly", false);
    $("#kategori").attr("readonly", false);
    $("#luas_kamar").attr("readonly", false);
    $("#harga").attr("readonly", false);
    $("#jarak").attr("readonly", false);
    $("#fasilitas").attr("readonly", false);
    $(".modal-footer").show();
    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-detail", function () {
    var id = $(this).attr("data-id");
    var pemilik = $(this).attr("data-pemilik");
    var alamat = $(this).attr("data-alamat");
    var kategori = $(this).attr("data-kategori");
    var luaskamar = $(this).attr("data-luaskamar");
    var harga = $(this).attr("data-harga");
    var jarak = $(this).attr("data-jarak");
    var fasilitas = $(this).attr("data-fasilitas");

    $(".modal-title").html('<i class="simple-icon-eye"></i> Detail');
    $("#action").val("detail");
    $("#id").val(id).attr("readonly", true);
    $("#pemilik").val(pemilik).attr("readonly", true);
    $("#alamat").val(alamat).attr("readonly", true);
    $("#kategori").val(kategori).attr("readonly", true);
    $("#luas_kamar").val(luaskamar).attr("readonly", true);
    $("#harga").val(harga).attr("readonly", true);
    $("#jarak").val(jarak).attr("readonly", true);
    $("#fasilitas").val(fasilitas).attr("readonly", true);
    $(".modal-footer").hide();
    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-edit", function () {
    var id = $(this).attr("data-id");
    var pemilik = $(this).attr("data-pemilik");
    var alamat = $(this).attr("data-alamat");
    var kategori = $(this).attr("data-kategori");
    var luaskamar = $(this).attr("data-luaskamar");
    var harga = $(this).attr("data-harga");
    var jarak = $(this).attr("data-jarak");
    var fasilitas = $(this).attr("data-fasilitas");

    $(".modal-title").html('<i class="simple-icon-pencil"></i> Edit');
    $("#action").val("edit");
    $("#id").val(id).attr("readonly", false);
    $("#pemilik").val(pemilik).attr("readonly", false);
    $("#alamat").val(alamat).attr("readonly", false);
    $("#kategori").val(kategori).attr("readonly", false);
    $("#luas_kamar").val(luaskamar).attr("readonly", false);
    $("#harga").val(harga).attr("readonly", false);
    $("#jarak").val(jarak).attr("readonly", false);
    $("#fasilitas").val(fasilitas).attr("readonly", false);
    $(".modal-footer").show();
    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-hapus", function () {
    var id = $(this).attr("data-id");

    if (confirm("Yakin ingin dihapus?")) {
      $.ajax({
        url: baseURL + "controllers/master_kos.php",
        method: "POST",
        dataType: "JSON",
        data: {
          action: "hapus",
          id: id,
        },
        success: function (res) {
          $.notify({ message: res.message }, { type: res.code });

          if (res.code === "success") {
            ce.ajax.reload(null, false);
          }
        },
      });
    }
  });

  $("#form")
    .parsley()
    .on("form:submit", function () {
      $.ajax({
        url: baseURL + "controllers/master_kos.php",
        method: "POST",
        dataType: "JSON",
        data: $("#form").serialize(),
        success: function (res) {
          $.notify({ message: res.message }, { type: res.code });

          if (res.code === "success") {
            ce.ajax.reload(null, false);
            $("#modal").modal("hide");
          }
        },
      });
    });
});
