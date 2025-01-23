function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.src = 'assets/hide.png'; 
        toggleIcon.alt = 'Masquer le mot de passe';
    } else {
        passwordInput.type = 'password';
        toggleIcon.src = 'assets/view.png'; 
        toggleIcon.alt = 'Afficher le mot de passe';
    }
}
