document.getElementById("profilForm").addEventListener("submit", function (event) {
  const requiredFields = ["last_name", "first_name", "email", "mobile_number", "gender", "address_line", "zipcode", "city", "country", "school_name", "student_email"];
  let isValid = true;

  requiredFields.forEach(fieldId => {
    const field = document.getElementById(fieldId);
    const errorElement = document.createElement("div");
    errorElement.className = "error-message";

    // Supprimer les anciens messages d'erreur
    if (field.nextElementSibling && field.nextElementSibling.classList.contains("error-message")) {
      field.nextElementSibling.remove();
    }

    if (!field.value.trim()) {
      errorElement.textContent = "Ce champ est obligatoire.";
      field.parentNode.appendChild(errorElement);
      isValid = false;
    }
  });

  if (!isValid) {
    event.preventDefault();
  } else {
    // Rafraîchir la page après soumission
    setTimeout(() => {
      window.location.reload();
    }, 500); // Temps pour laisser le serveur traiter les données
  }
});
