document.addEventListener("DOMContentLoaded", () => {
    const banner = document.getElementById("student-life-banner");
    const menu = document.getElementById("dropdown-menu");

    banner.addEventListener("click", () => {
        menu.classList.toggle("show");
    });
});
