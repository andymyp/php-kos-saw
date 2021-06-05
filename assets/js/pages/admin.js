$(document).ready(function () {
  var baseURL = $("#base-url").attr("href");

  $("#modal").on("hidden.bs.modal", function () {
    $("#form")[0].reset();
    $("#form").parsley().reset();
  });

  $("body").on("click", ".btn-tambah", function () {
    $(".modal-title").html('<i class="simple-icon-plus"></i> Tambah');
    $("#action").val("tambah");
    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-edit", function () {
    var id = $(this).attr("data-id");
    var nama = $(this).attr("data-nama");
    var username = $(this).attr("data-username");
    var password = $(this).attr("data-password");

    $(".modal-title").html('<i class="simple-icon-pencil"></i> Edit');
    $("#action").val("edit");
    $("#id").val(id);
    $("#nama").val(nama);
    $("#username").val(username);
    $("#password").val(password);
    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-hapus", function () {
    var id = $(this).attr("data-id");

    if (confirm("Yakin ingin dihapus?")) {
      $.ajax({
        url: baseURL + "controllers/admin.php",
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
        url: baseURL + "controllers/admin.php",
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
