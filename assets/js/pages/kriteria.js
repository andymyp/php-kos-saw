$(document).ready(function () {
  var baseURL = $("#base-url").attr("href");

  $("#modal").on("hidden.bs.modal", function () {
    $("#form")[0].reset();
    $("#form").parsley().reset();
  });

  $("body").on("click", ".btn-edit", function () {
    var id = $(this).attr("data-id");
    var bobot = $(this).attr("data-bobot");

    $(".modal-title").html('<i class="simple-icon-pencil"></i> Edit');
    $("#action").val("edit");
    $("#id").val(id);
    $("#bobot").val(bobot);
    $("#modal").modal("show");
  });

  $("#form")
    .parsley()
    .on("form:submit", function () {
      $.ajax({
        url: baseURL + "controllers/kriteria.php",
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
