
const navItems = document.querySelectorAll('.nav-item');

navItems.forEach(item => {
    console.log("je suis dans le foreach");
    item.addEventListener('click', () => {
        document.querySelector('.nav-item.active')?.classList.remove('active');
        item.classList.add('active');
    });
});
