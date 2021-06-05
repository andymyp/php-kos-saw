$(document).ready(function () {
  var baseURL = $("#base-url").attr("href");

  $("#modal").on("hidden.bs.modal", function () {
    $("#form")[0].reset();
    $("#form").parsley().reset();
  });

  $("body").on("click", ".btn-tambah", function () {
    $(".modal-title").html('<i class="simple-icon-plus"></i> Tambah');
    $("#action").val("tambah");
    $("#min").val("0");
    $("#max").val("0");
    $(".minmax").hide();
    $("#modal").modal("show");
  });

  $("body").on("change", "#kd_kriteria", function () {
    var val = $(this).val();

    if (val == "C1" || val == "C2") {
      $(".minmax").show();
    } else {
      $("#min").val("0");
      $("#max").val("0");
      $(".minmax").hide();
    }
  });

  $("body").on("click", ".btn-edit", function () {
    var id = $(this).attr("data-id");
    var kriteria = $(this).attr("data-kriteria");
    var subkriteria = $(this).attr("data-subkriteria");
    var min = $(this).attr("data-min");
    var max = $(this).attr("data-max");
    var nilai = $(this).attr("data-nilai");

    $(".modal-title").html('<i class="simple-icon-pencil"></i> Edit');
    $("#action").val("edit");
    $("#id").val(id);
    $("#kd_kriteria").val(kriteria);
    $("#subkriteria").val(subkriteria);
    $("#min").val(min);
    $("#max").val(max);
    $("#nilai").val(nilai);

    if (kriteria == "C1" || kriteria == "C2") {
      $(".minmax").show();
    } else {
      $(".minmax").hide();
    }

    $("#modal").modal("show");
  });

  $("body").on("click", ".btn-hapus", function () {
    var id = $(this).attr("data-id");

    if (confirm("Yakin ingin dihapus?")) {
      $.ajax({
        url: baseURL + "controllers/sub_kriteria.php",
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
        url: baseURL + "controllers/sub_kriteria.php",
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
