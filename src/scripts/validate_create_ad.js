document.addEventListener("DOMContentLoaded", function() {
    // Récupérer le formulaire
    const form = document.getElementById("form_infos");
    
    // Fonction de validation
    function validateForm(event) {
        const requiredFields = form.querySelectorAll("[required]");
        let valid = true; 

        requiredFields.forEach(function(field) {
           
            if (!field.value.trim()) {
                valid = false;
                field.style.borderColor = "red"; 
              
                if (!field.nextElementSibling || !field.nextElementSibling.classList.contains("error-message")) {
                    const errorMessage = document.createElement("div");
                    errorMessage.classList.add("error-message");
                    errorMessage.textContent = "Ce champ est obligatoire.";
                    field.insertAdjacentElement("afterend", errorMessage);
                }
            } else {
                field.style.borderColor = ""; 
                if (field.nextElementSibling && field.nextElementSibling.classList.contains("error-message")) {
                    field.nextElementSibling.remove();
                }
            }
        });

        
        if (!valid) {
            event.preventDefault();
            alert("Veuillez remplir tous les champs obligatoires.");
        }
    }

    form.addEventListener("submit", validateForm);
});
