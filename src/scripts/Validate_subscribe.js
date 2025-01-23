document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".registration-form-inscription");
    const inputs = form.querySelectorAll("input[required], select[required]");
    const role = document.getElementById("profile_status");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");

    form.addEventListener("submit", function (event) {
        let isValid = true;

        inputs.forEach(input => {
            const errorSpan = input.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains("error-message")) {
                errorSpan.remove();
            }
        });

      
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                displayError(input, "Ce champ est obligatoire.");
            }
        });

    
        if (!role.value.trim()) {
            isValid = false;
            displayError(role, "Veuillez sélectionner un rôle.");
        }

        if (password.value && confirmPassword.value && password.value !== confirmPassword.value) {
            isValid = false;
            displayError(confirmPassword, "Les mots de passe ne correspondent pas.");
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function displayError(input, message) {
        const errorSpan = document.createElement("span");
        errorSpan.className = "error-message";
        errorSpan.textContent = message;
        input.insertAdjacentElement("afterend", errorSpan);
    }
});
