document.addEventListener("DOMContentLoaded", function() {
    // Seleccionar todos los carruseles
    const carousels = document.querySelectorAll(".multiple");

    carousels.forEach((carousel) => {
        const carouselInner = carousel.querySelector(".carousel-inner");
        let cardWidth = carousel.querySelector(".multiple-item").getBoundingClientRect().width;
        let scrollPosition = 0;

        // Botón "Siguiente"
        carousel.querySelector(".multiple-next").addEventListener("click", () => {
            const maxScroll = carouselInner.scrollWidth - carouselInner.clientWidth;
            if (scrollPosition < maxScroll) {
                scrollPosition += cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth",
                });
            }
        });

        // Botón "Anterior"
        carousel.querySelector(".multiple-prev").addEventListener("click", () => {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth",
                });
            }
        });

        // Actualizar el ancho de las tarjetas en cambio de tamaño
        window.addEventListener("resize", () => {
            cardWidth = carousel.querySelector(".multiple-item").getBoundingClientRect().width;
        });
    });
});
