function saveProfile() {
    alert('Profil sauvegardé avec succès !');
}

document.querySelectorAll('#profilForm input').forEach(input => {
    input.addEventListener('blur', () => {
        if (!input.value.trim()) {
            input.value = ''; 
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#profilForm');
    const genderField = document.querySelector('#gender'); 

    if (form && genderField) {
        form.addEventListener('submit', function(e) {
            const gender = genderField.value; 

            if (!gender) {
                alert('Veuillez sélectionner votre sexe');
                e.preventDefault(); 
            }
        });
    } else {
        console.error('Formulaire ou champ de sexe non trouvé');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    
    if (saveProfileBtn) {
        saveProfileBtn.addEventListener('click', async () => {
            const formData = new FormData(document.getElementById('profilForm'));
            const data = Object.fromEntries(formData.entries());

            if (data.newPassword && data.newPassword !== data.confirmPassword) {
                alert('Les mots de passe ne correspondent pas.');
                return;
            }

            const response = await fetch('controller_Profil.php?action=updateProfil', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'updateProfile', data })
            });

            const result = await response.json();

            if (result.success) {
                alert('Profil mis à jour avec succès.');

                const userData = result.userData;

                document.getElementById('last_name').value = userData.last_name;
                document.getElementById('first_name').value = userData.first_name;
                document.getElementById('email').value = userData.email;
                document.getElementById('mobile_number').value = userData.mobile_number;
                document.getElementById('gender').value = userData.sexe;

                document.getElementById('address_line').value = userData.address_line;
                document.getElementById('zipcode').value = userData.zipcode;
                document.getElementById('city').value = userData.city;
                document.getElementById('country').value = userData.country;

                document.getElementById('school_name').value = userData.school_name;
                document.getElementById('student_email').value = userData.student_email;
            } else {
                alert('Erreur lors de la mise à jour.');
            }
        });
    } else {
        console.error("Le bouton #saveProfileBtn n'a pas été trouvé");
    }
});

