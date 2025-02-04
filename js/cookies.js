document.addEventListener("DOMContentLoaded", function () {
  var cookieAlert = document.querySelector("#aviso-cookies");
  var acceptCookies = document.querySelector("#btn-aceptar-cookies");
  var rejectCookies = document.querySelector("#btn-rechazar-cookies");
  var bloqueoCookies = document.querySelector("#bloqueo-cookies");

  if (!cookieAlert || !bloqueoCookies) {
    return;
  }

  if (!getCookie("rbdmCookie")) {
    // Mostrar el aviso de cookies y el fondo de bloqueo
    cookieAlert.classList.remove("oculto");
    bloqueoCookies.classList.remove("oculto");
    document.body.style.overflow = "hidden"; // Bloquear el scroll mientras se ve el aviso
  } else {
    ocultarAvisoCookies();
  }

  acceptCookies.addEventListener("click", function () {
    setCookie("rbdmCookie", "accepted", 365);
    ocultarAvisoCookies();
  });

  rejectCookies.addEventListener("click", function () {
    setCookie("rbdmCookie", "rejected", 365);
    ocultarAvisoCookies();
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
