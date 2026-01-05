document.addEventListener('DOMContentLoaded', function() {
    // Sélection des éléments du DOM
    const slides = document.querySelector('.slides');
    // On cible les conteneurs .slide-item au lieu des img directes
    const slideItems = document.querySelectorAll('.slide-item');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    const dots = document.querySelectorAll('.dots li');

    // Configuration
    let index = 0;
    const totalItems = slideItems.length; // 15 produits
    const visibleImages = 3;           
    const maxIndex = totalItems - visibleImages; 

    /**
     * Met à jour la position du carrousel et l'état des dots
     */
    function updateCarousel() {
        // Chaque .slide-item prend 33.33% de la largeur du conteneur
        const percentage = 100 / visibleImages;
        const offset = -index * percentage;
        
        slides.style.transform = `translateX(${offset}%)`;

        // Mise à jour visuelle des points (dots)
        dots.forEach((dot, i) => {
            // Un point est "actif" si l'index actuel correspond
            dot.classList.toggle('active', i === index);
        });
    }

    /**
     * Événement Clic sur le bouton Suivant
     */
    next.addEventListener('click', () => {
        if (index < maxIndex) {
            index++;
        } else {
            index = 0; // Retour au début
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
            index = maxIndex; // Va à la fin
        }
        updateCarousel();
    });

    /**
     * Gestion du clic sur les points (dots)
     */
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            // On limite l'index pour ne pas scroller sur du vide à la fin
            index = Math.min(i, maxIndex);
            updateCarousel();
        });
    });

    // Optionnel : Défilement automatique
    let autoPlay = setInterval(() => {
        next.click();
    }, 5000);

    // Arrêter le défilement auto quand l'utilisateur interagit
    const stopAutoPlay = () => clearInterval(autoPlay);
    next.addEventListener('mousedown', stopAutoPlay);
    prev.addEventListener('mousedown', stopAutoPlay);
});