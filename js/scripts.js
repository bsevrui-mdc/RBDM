/* Script carrusel multiple endex.php */

document.addEventListener("DOMContentLoaded", function () {
  const carouselInner = document.querySelector(".carousel-inner");
  const carouselItems = document.querySelectorAll(".carousel-item");
  let scrollPosition = 0;

  // Evento para el botón "Siguiente"
  document
    .querySelector(".carousel-control-next")
    .addEventListener("click", () => {
      const cardWidth = carouselItems[0].offsetWidth; // Calcula el ancho de una tarjeta
      const maxScrollPosition =
        carouselInner.scrollWidth - carouselInner.clientWidth; // Máximo scroll permitido

      if (scrollPosition < maxScrollPosition) {
        scrollPosition += cardWidth;
        if (scrollPosition > maxScrollPosition)
          scrollPosition = maxScrollPosition; // No pasar del máximo
        carouselInner.scrollTo({
          left: scrollPosition,
          behavior: "smooth",
        });
      }
    });

  // Evento para el botón "Anterior"
  document
    .querySelector(".carousel-control-prev")
    .addEventListener("click", () => {
      const cardWidth = carouselItems[0].offsetWidth; // Calcula el ancho de una tarjeta

      if (scrollPosition > 0) {
        scrollPosition -= cardWidth;
        if (scrollPosition < 0) scrollPosition = 0; // No pasar del mínimo
        carouselInner.scrollTo({
          left: scrollPosition,
          behavior: "smooth",
        });
      }
    });
});