document.addEventListener("DOMContentLoaded", () => {
    const banner = document.getElementById("student-life-banner");
    const menu = document.getElementById("dropdown-menu");

    banner.addEventListener("click", () => {
        menu.classList.toggle("show");
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    startDateInput.addEventListener('change', () => {
        if (endDateInput.value && new Date(endDateInput.value) < new Date(startDateInput.value)) {
            endDateInput.value = ''; 
        }
        endDateInput.min = startDateInput.value; 
    });

    endDateInput.addEventListener('change', () => {
        if (startDateInput.value && new Date(startDateInput.value) > new Date(endDateInput.value)) {
            startDateInput.value = ''; 
        }
    });
});



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
