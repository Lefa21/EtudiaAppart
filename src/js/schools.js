document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector(".image-slider");
    const sections = document.querySelectorAll(".image-container");
    let currentSection = 0;

    window.addEventListener("wheel", (event) => {
    if (event.deltaY > 0) {
        // Scroll vers le bas
        if (currentSection < sections.length - 1) {
        currentSection++;
        }
    } else {
        // Scroll vers le haut
        if (currentSection > 0) {
        currentSection--;
        }
    }

    // Scroll vers la section correspondante
    const targetSection = sections[currentSection];
    targetSection.scrollIntoView({ behavior: "smooth" });
    });
});