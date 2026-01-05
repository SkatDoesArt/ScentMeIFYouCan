document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du DOM
    const slides = document.querySelector('.slides');
    const images = document.querySelectorAll('.slides img');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    const dots = document.querySelectorAll('.dots li');

    // Configuration
    let index = 0;
    const totalImages = images.length; // 15 images
    const visibleImages = 3;           // Nombre d'images affichées en même temps
    const maxIndex = totalImages - visibleImages; // L'index maximum pour ne pas scroller dans le vide

    /**
     * Met à jour la position du carrousel et l'état des dots
     */
    function updateCarousel() {
        // Chaque image prend 33.33% de la largeur du conteneur
        // On décale donc de l'index multiplié par (100 / 3)
        const percentage = 100 / visibleImages;
        const offset = -index * percentage;
        
        slides.style.transform = `translateX(${offset}%)`;

        // Mise à jour visuelle des points (dots)
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    /**
     * Événement Clic sur le bouton Suivant
     */
    next.addEventListener('click', () => {
        if (index < maxIndex) {
            index++;
        } else {
            index = 0; // Retour au début si on arrive à la fin
        }
        updateCarousel();
    });

    /**
     * Événement Clic sur le bouton Précédent
     */
    prev.addEventListener('click', () => {
        if (index > 0) {
            index--;
        } else {
            index = maxIndex; // Va à la fin si on recule au début
        }
        updateCarousel();
    });

    /**
     * Gestion du clic sur les points (dots)
     */
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            // On ne permet de cliquer que sur les index valides (ceux qui ne dépassent pas maxIndex)
            if (i <= maxIndex) {
                index = i;
                updateCarousel();
            } else {
                // Si l'utilisateur clique sur un dot trop loin, on force le dernier index possible
                index = maxIndex;
                updateCarousel();
            }
        });
    });

    // Optionnel : Défilement automatique toutes le 5 secondes
    setInterval(() => {
        next.click();
    }, 5000);

});