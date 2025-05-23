document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navigation = document.getElementById('main-navigation');
    const navLinks = document.querySelectorAll('#main-navigation a');

    if (menuToggle && navigation) {
        menuToggle.addEventListener('click', function () {
            const isOpen = menuToggle.classList.toggle('open');
            navigation.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
        });

        document.addEventListener('click', function (e) {
            if (!menuToggle.contains(e.target) && !navigation.contains(e.target)) {
                menuToggle.classList.remove('open');
                navigation.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });

        navLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);

                if (targetSection) {
                    e.preventDefault();
                    menuToggle.classList.remove('open');
                    navigation.classList.remove('open');
                    menuToggle.setAttribute('aria-expanded', 'false');

                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
});
