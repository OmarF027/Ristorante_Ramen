document.addEventListener("DOMContentLoaded", () => {
    // --- Modal carosello immagini ---
    const modal = document.getElementById("modal");
    const modalImg = document.getElementById("modal-img");
    const closeBtn = document.querySelector(".close");
    const prevBtn = document.querySelector(".prev");
    const nextBtn = document.querySelector(".next");
    const galleryItems = document.querySelectorAll(".gallery-item img");
    
    const galleryImages = Array.from(galleryItems).map(img => img.src);

    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        modal.style.display = "flex";
        modalImg.src = galleryImages[currentIndex];
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function showPrev() {
        currentIndex = (currentIndex === 0) ? galleryImages.length - 1 : currentIndex - 1;
        modalImg.src = galleryImages[currentIndex];
    }

    function showNext() {
        currentIndex = (currentIndex === galleryImages.length - 1) ? 0 : currentIndex + 1;
        modalImg.src = galleryImages[currentIndex];
    }

    galleryItems.forEach((img, index) => {
        img.addEventListener("click", () => openModal(index));
    });

    closeBtn.addEventListener("click", closeModal);
    prevBtn.addEventListener("click", showPrev);
    nextBtn.addEventListener("click", showNext);

    window.addEventListener("click", e => {
        if (e.target === modal) closeModal();
    });

    window.addEventListener("keydown", e => {
        if (modal.style.display === "flex") {
            if (e.key === "ArrowLeft") showPrev();
            if (e.key === "ArrowRight") showNext();
            if (e.key === "Escape") closeModal();
        }
    });

    // --- Toggle menu e scroll fluido ---
    const menuToggle = document.getElementById('menuToggle');
    const navigation = document.getElementById('main-navigation');
    const navLinks = document.querySelectorAll('#main-navigation a');

    menuToggle.addEventListener('click', function () {
        const isOpen = menuToggle.classList.toggle('open');
        navigation.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', isOpen);
    });

    // Chiudi menu cliccando fuori
    document.addEventListener('click', function(e) {
        if (!menuToggle.contains(e.target) && !navigation.contains(e.target)) {
            menuToggle.classList.remove('open');
            navigation.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Chiudi menu e scroll fluido sui link
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                e.preventDefault();

                // Chiudi il menu
                menuToggle.classList.remove('open');
                navigation.classList.remove('open');
                menuToggle.setAttribute('aria-expanded', 'false');

                // Scroll fluido
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});