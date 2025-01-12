document.addEventListener("DOMContentLoaded", () => {
    const steps = document.querySelectorAll(".form-step");  // Sélectionne toutes les étapes du formulaire
    const navigationButtons = document.querySelectorAll(".button[data-step]");  // Sélectionne les boutons Suivant/Précédent
    const navItems = document.querySelectorAll('.nav-item');  // Sélectionne les liens du menu

    let currentStepIndex = 0;  // Indice de l'étape active

    // Fonction pour mettre à jour l'affichage des étapes et le menu de navigation
    function updateSteps() {
        // Mise à jour de l'affichage des étapes
        steps.forEach((step, index) => {
            if (index === currentStepIndex) {
                step.classList.add("active");
            } else {
                step.classList.remove("active");
            }
        });

        // Mise à jour du menu de navigation
        navItems.forEach(item => {
            const stepName = item.getAttribute('data-step');
            if (stepName === steps[currentStepIndex].id.replace('container_', '')) {
                item.classList.add('active');  // Lien correspondant à l'étape active devient "actif"
            } else {
                item.classList.remove('active');
            }
        });
    }

    // Ajoute un événement de clic à chaque élément du menu
    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            // Récupère le numéro de l'étape depuis l'attribut data-step de l'élément du menu cliqué
            const stepName = e.target.closest('.nav-item').getAttribute('data-step');
            console.log("Étape cliquée:", stepName);

            // Met à jour l'indice de l'étape active
            currentStepIndex = Array.from(steps).findIndex(step => step.id === `container_${stepName}`);
            updateSteps();  // Met à jour les étapes et le menu de navigation
        });
    });

    // Gestion des clics sur les boutons Suivant et Précédent
    navigationButtons.forEach(button => {
        button.addEventListener("click", () => {
            const stepChange = parseInt(button.getAttribute("data-step"), 10);
            currentStepIndex += stepChange;  // Change l'index de l'étape active

            // Vérifie si l'index est valide
            if (currentStepIndex >= 0 && currentStepIndex < steps.length) {
                updateSteps();  // Met à jour les étapes et le menu de navigation
            }
        });
    });

    // Initialisation
    updateSteps();  // Affiche la première étape et met à jour le menu au chargement
});
