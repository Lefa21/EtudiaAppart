document.querySelector('.v-e-btn').addEventListener('click', () => {
    const dropdownContent = document.querySelector('.dropdown-content');
    const button = document.querySelector('.v-e-btn');

    // Afficher ou masquer le menu
    dropdownContent.classList.toggle('show');

    // Ajouter ou supprimer la classe pour changer les bordures
    button.classList.toggle('no-border');
});

// Fermer le menu si on clique en dehors
window.addEventListener('click', (event) => {
    if (!event.target.matches('.v-e-btn')) {
        const dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach((dropdown) => {
            dropdown.classList.remove('show');
        });

        const buttons = document.querySelectorAll('.v-e-btn');
        buttons.forEach((button) => {
            button.classList.remove('no-border');
        });
    }
});
