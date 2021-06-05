function loadStyle(e, t) {
  for (var o = 0; o < document.styleSheets.length; o++)
    if (document.styleSheets[o].href == e) return;
  var a = document.getElementsByTagName("head")[0],
    r = document.createElement("link");
  (r.rel = "stylesheet"),
    (r.type = "text/css"),
    (r.href = e),
    t &&
      (r.onload = function () {
        t();
      });
  var l = $(a).find('[href$="main.css"]');
  0 !== l.length ? l[0].before(r) : a.appendChild(r);
}
!(function (e) {
  e().dropzone && (Dropzone.autoDiscover = !1);
  try {
    localStorage.setItem("dore-is-private-tab", !1);
  } catch (e) {}
  var t = "dore.light.bluenavy.min.css",
    o = "ltr",
    a = "rounded";
  try {
    localStorage.getItem("dore-theme-color")
      ? (t = localStorage.getItem("dore-theme-color"))
      : localStorage.setItem("dore-theme-color", t),
      localStorage.getItem("dore-direction")
        ? (o = localStorage.getItem("dore-direction"))
        : localStorage.setItem("dore-direction", o),
      localStorage.getItem("dore-radius")
        ? (a = localStorage.getItem("dore-radius"))
        : localStorage.setItem("dore-radius", a);
  } catch (e) {
    (t = "dore.light.bluenavy.min.css"), (o = "ltr"), (a = "rounded");
  }

  function r() {
    e("body").addClass(o),
      e("html").attr("dir", o),
      e("body").addClass(a),
      e("body").dore();
  }
  e(".theme-color[data-theme='" + t + "']").addClass("active"),
    e(".direction-radio[data-direction='" + o + "']").attr("checked", !0),
    e(".radius-radio[data-radius='" + a + "']").attr("checked", !0),
    e("#switchDark").attr("checked", t.indexOf("dark") > 0),
    loadStyle("assets/css/" + t, function () {
      setTimeout(r, 300);
    }),
    e("body").on("click", ".theme-color", function (t) {
      t.preventDefault();
      var o = e(this).data("theme");
      try {
        localStorage.setItem("dore-theme-color", o), window.location.reload();
      } catch (e) {}
    }),
    e("input[name='directionRadio']").on("change", function (t) {
      var o = e(t.currentTarget).data("direction");
      try {
        localStorage.setItem("dore-direction", o), window.location.reload();
      } catch (e) {}
    }),
    e("input[name='radiusRadio']").on("change", function (t) {
      var o = e(t.currentTarget).data("radius");
      try {
        localStorage.setItem("dore-radius", o), window.location.reload();
      } catch (e) {}
    }),
    e("#switchDark").on("change", function (o) {
      var a = e(o.currentTarget)[0].checked ? "dark" : "light";
      "dark" == a
        ? (t = t.replace("light", "dark"))
        : "light" == a && (t = t.replace("dark", "light"));
      try {
        localStorage.setItem("dore-theme-color", t), window.location.reload();
      } catch (e) {}
    }),
    e(".theme-button").on("click", function (t) {
      t.preventDefault(), e(this).parents(".theme-colors").toggleClass("shown");
    }),
    e(document).on("click", function (t) {
      e(t.target).parents().hasClass("theme-colors") ||
        e(t.target).parents().hasClass("theme-button") ||
        e(t.target).hasClass("theme-button") ||
        e(t.target).hasClass("theme-colors") ||
        (e(".theme-colors").hasClass("shown") &&
          e(".theme-colors").removeClass("shown"));
    });
})(jQuery);
