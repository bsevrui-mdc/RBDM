document.addEventListener("DOMContentLoaded", function () {
  const deleteButtons = document.querySelectorAll(".delete-button");

  deleteButtons.forEach((button) => {
    button.addEventListener("keydown", function (event) {
      if (event.key === "Tab" && !event.shiftKey) {
        event.preventDefault();

        const currentRow = button.closest("li");
        const nextRow = currentRow.nextElementSibling;

        if (nextRow) {
          const firstFocusableElement = nextRow.querySelector(
            'a, button, input, [tabindex]:not([tabindex="-1"])'
          );
          if (firstFocusableElement) {
            firstFocusableElement.focus();
          }
        } else {
          const footer = document.querySelector("footer");
          if (footer) {
            const firstFocusableElementInFooter = footer.querySelector(
              'a, button, input, [tabindex]:not([tabindex="-1"])'
            );
            if (firstFocusableElementInFooter) {
              firstFocusableElementInFooter.focus();
            } else {
              document.body.focus();
            }
          } else {
            document.body.focus();
          }
        }
      }
    });
  });
});
