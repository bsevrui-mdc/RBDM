document.addEventListener("DOMContentLoaded", function () {
  var cookieAlert = document.querySelector("#aviso-cookies");
  var acceptCookies = document.querySelector("#btn-aceptar-cookies");
  var rejectCookies = document.querySelector("#btn-rechazar-cookies");
  var bloqueoCookies = document.querySelector("#bloqueo-cookies");
  var modal = document.getElementById("modal");
  var aceptarmodal = document.getElementById("aceptarmodal");

  if (!cookieAlert || !bloqueoCookies) {
    return;
  }

  if (!getCookie("rbdmCookie")) {
    cookieAlert.classList.remove("oculto");
    bloqueoCookies.classList.remove("oculto");
    document.body.style.overflow = "hidden"; // Bloquear el scroll mientras se ve el aviso
  } else {
    ocultarAvisoCookies();
    if (!getCookie("novedades")) {
      modal.style.display = "block";
    }
  }

  acceptCookies.addEventListener("click", function () {
    setCookie("rbdmCookie", "accepted", 365);
    ocultarAvisoCookies();
    if (!getCookie("novedades")) {
      modal.style.display = "block";
    }
  });

  aceptarmodal.addEventListener("click", function () {
    setCookie("novedades", "accepted", 30);
    modal.style.display = "none";
  });

  rejectCookies.addEventListener("click", function () {
    location.href = "https://google.com";
  });

  function ocultarAvisoCookies() {
    // Ocultar el aviso de cookies y el fondo de bloqueo usando clases
    cookieAlert.classList.add("oculto");
    bloqueoCookies.classList.add("oculto");
    document.body.style.overflow = "auto"; // Restaurar el scroll
    document.body.style.marginBottom = "0"; // Eliminar margen extra si existía
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i].trim();
      if (c.indexOf(name) === 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
});
