document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.action-button.primary');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const fileUrl = button.getAttribute('data-file-url');
            if (fileUrl) {
                window.location.href = fileUrl;
            } else {
                alert("L'URL du dossier est introuvable !");
            }
        });
    });
});
