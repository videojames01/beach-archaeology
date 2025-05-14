window.onload = function() {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links')
    const navMenu = document.querySelector('nav');

    hamburger.addEventListener('click', function() {
        if (navLinks.style.display === 'none') {
            navLinks.style.display = 'block';
            navMenu.style.height = '100%';
            navMenu.style.width = '40%';
        } else {
            navLinks.style.display = 'none';
            navMenu.style.height = 'auto';
            navMenu.style.width = 'auto';
        }
    })
}
