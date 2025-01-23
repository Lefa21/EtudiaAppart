document.addEventListener("DOMContentLoaded", function () {
  const toggleButtons = document.querySelectorAll(".toggle-filter");

  toggleButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();

      const filterSection = this.closest(".filter-section");
      const arrowImage = filterSection.querySelector(".arrow_filter");

      if (filterSection.classList.contains("active")) {
        filterSection.classList.remove("active");
        arrowImage.src = "assets/arrow_down_blue.svg";
      } else {
        filterSection.classList.add("active");
        arrowImage.src = "assets/arrow_up_blue.svg";
      }
    });
  });

  // Gestion du bouton générique
  const genericToggleButton = document.querySelector(".toggle-filter_generic");
  genericToggleButton.addEventListener("click", function (e) {
    e.preventDefault();

    const filterSections = document.querySelectorAll(
      ".filter-container .filter-section",
    );
    const arrowIcon = this.querySelector("img");

    filterSections.forEach((section) => {
      if (section.style.display === "none" || section.style.display === "") {
        section.style.display = "block";
      } else {
        section.style.display = "none";
      }
    });

    if (arrowIcon.src.includes("arrow_down_blue.svg")) {
      arrowIcon.src = "assets/arrow_up_blue.svg";
    } else {
      arrowIcon.src = "assets/arrow_down_blue.svg";
    }
  });
});
