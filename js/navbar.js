document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelectorAll("[data-bs-toggle='dropdown']")
    .forEach((element) => {
      element.addEventListener("keydown", function (event) {
        if (event.key === "Enter" || event.key === " ") {
          // Detectar Enter o Espacio
          event.preventDefault();
          let dropdown = new bootstrap.Dropdown(this);
          dropdown.toggle();
        }
      });
    });
});
