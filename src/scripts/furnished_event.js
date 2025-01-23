document.addEventListener('DOMContentLoaded', () => {
    const furnishedYes = document.getElementById('furnishedYes');
    const furnishedNo = document.getElementById('furnishedNo');

    furnishedYes.addEventListener('change', () => {
        if (furnishedYes.checked) {
            furnishedNo.checked = false;
        }
    });

    furnishedNo.addEventListener('change', () => {
        if (furnishedNo.checked) {
            furnishedYes.checked = false;
        }
    });
});