$(document).ready(function () {
  var baseURL = $("#base-url").attr("href");
  var currentURL = window.location.href;

  $("#modal-login").on("hidden.bs.modal", function () {
    $("#form-login")[0].reset();
    $("#form-login").parsley().reset();
  });

  $("#form-login")
    .parsley()
    .on("form:submit", function () {
      $.ajax({
        url: baseURL + "controllers/login.php",
        method: "POST",
        dataType: "JSON",
        data: $("#form-login").serialize(),
        success: function (res) {
          $.notify({ message: res.message }, { type: res.code });

          if (res.code === "success") {
            window.location = currentURL;
          }
        },
      });
    });

  $("body").on("click", ".btn-logout", function () {
    if (confirm("Yakin ingin logout?")) {
      $.ajax({
        url: baseURL + "controllers/login.php",
        method: "POST",
        dataType: "JSON",
        data: {
          action: "logout",
        },
        success: function (res) {
          $.notify({ message: res.message }, { type: res.code });

          if (res.code === "success") {
            window.location = baseURL;
          }
        },
      });
    }
  });
});
