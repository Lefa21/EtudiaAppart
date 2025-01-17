document.getElementById('profile-image').addEventListener('change', function(event) {
    var fileInput = document.getElementById('profile-image');
    var file = fileInput.files[0];
    var errorMessage = document.getElementById('error-message');

    // Réinitialiser le message d'erreur
    errorMessage.style.display = 'none';
    errorMessage.textContent = '';

    // Vérification si un fichier est sélectionné
    if (!file) {
        errorMessage.textContent = 'Erreur : Aucun fichier sélectionné.';
        errorMessage.style.display = 'block';
        return;  // Ne pas soumettre le formulaire
    }

    // Vérification du type MIME
    var allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedTypes.includes(file.type)) {
        errorMessage.textContent = 'Erreur : type de fichier non valide. Seuls les fichiers JPEG, PNG et GIF sont autorisés.';
        errorMessage.style.display = 'block';
        return;  // Ne pas envoyer le formulaire
    }

    // Vérification de la taille du fichier
    if (file.size > 5 * 1024 * 1024) {
        errorMessage.textContent = 'Erreur : fichier trop volumineux. La taille maximale est de 5 Mo.';
        errorMessage.style.display = 'block';
        return;  // Ne pas envoyer le formulaire
    }

    // Créer un objet FormData pour envoyer le fichier via AJAX
    var formData = new FormData();
    formData.append('profile-image', file);

    // Envoi de la requête AJAX au serveur
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?module=my_account&action=updateProfilePicture', true);
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Photo de profil mise à jour avec succès');
                // Optionnel : rediriger ou mettre à jour la page
            } else {
                errorMessage.textContent = response.message;
                errorMessage.style.display = 'block';
            }
        } else {
            errorMessage.textContent = 'Erreur de communication avec le serveur.';
            errorMessage.style.display = 'block';
        }
    };

    // Envoyer les données du formulaire via AJAX
    xhr.send(formData);
});
