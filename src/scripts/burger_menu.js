// Toggle the dropdown menu for "Mon compte"
function toggleDropdownMenu() {
    const dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('active');
}

// Toggle the hamburger menu on small screens
const hamburger = document.getElementById('hamburgerMenu');
const navMenu = document.getElementById('navMenu');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
});
