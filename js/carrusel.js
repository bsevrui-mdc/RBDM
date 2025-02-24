document.addEventListener("DOMContentLoaded", function () {
  let carrusel = document.getElementById("carrusel");
  let bootstrapCarrusel = new bootstrap.Carousel(carrusel, { interval: 3000 });

  function pausarCarrusel() {
    bootstrapCarrusel.pause();
  }

  function reanudarCarrusel() {
    bootstrapCarrusel.cycle();
  }

  // Pausar cuando el usuario pone el cursor o usa Tab
  carrusel.addEventListener("mouseenter", pausarCarrusel);
  carrusel.addEventListener("focusin", pausarCarrusel);

  // Reanudar solo si el usuario sale completamente del carrusel
  carrusel.addEventListener("mouseleave", reanudarCarrusel);
  carrusel.addEventListener("focusout", function (event) {
    if (!carrusel.contains(event.relatedTarget)) {
      reanudarCarrusel();
    }
  });
});
