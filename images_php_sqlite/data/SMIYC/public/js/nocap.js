document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelector('.slides');
    const slideItems = document.querySelectorAll('.slide-item');
    const next = document.getElementById('next');
    const prev = document.getElementById('prev');
    const dots = document.querySelectorAll('.dots li');

    // Configuration
    const visibleImages = 3;
    const totalRealItems = slideItems.length; // 15
    const percentage = 100 / visibleImages;
    let index = visibleImages; 
    let isTransitioning = false; // Sécurité pour éviter les bugs de clic rapide
    
    // 1. CLONAGE
    for(let i = 0; i < visibleImages; i++) {
        const cloneStart = slideItems[i].cloneNode(true);
        slides.appendChild(cloneStart);
    }
    for(let i = 0; i < visibleImages; i++) {
        const cloneEnd = slideItems[totalRealItems - 1 - i].cloneNode(true);
        slides.insertBefore(cloneEnd, slides.firstChild);
    }

    // Initialisation
    slides.style.transition = 'none';
    slides.style.transform = `translateX(${-index * percentage}%)`;

    function updateCarousel(withAnimation = true) {
        if (withAnimation) {
            slides.style.transition = 'transform 0.5s ease-in-out';
            isTransitioning = true;
        } else {
            slides.style.transition = 'none';
            isTransitioning = false;
        }
        slides.style.transform = `translateX(${-index * percentage}%)`;

        // CORRECTION DES DOTS : Calcul robuste de l'index actif
        // On ramène l'index dans la plage [0, 14] peu importe les clones
        let activeDotIndex;
        if (index >= totalRealItems + visibleImages) {
            activeDotIndex = 0;
        } else if (index < visibleImages) {
            activeDotIndex = totalRealItems - (visibleImages - index);
        } else {
            activeDotIndex = index - visibleImages;
        }
        
        // Sécurité supplémentaire avec modulo pour être sûr
        activeDotIndex = (activeDotIndex + totalRealItems) % totalRealItems;

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === activeDotIndex);
        });
    }

    slides.addEventListener('transitionend', () => {
        isTransitioning = false;
        // Saut invisible de la fin vers le début
        if (index >= totalRealItems + visibleImages) {
            index = visibleImages;
            updateCarousel(false);
        }
        // Saut invisible du début vers la fin
        if (index <= 0) {
            index = totalRealItems;
            updateCarousel(false);
        }
    });

    next.addEventListener('click', () => {
        if (isTransitioning) return;
        index++;
        updateCarousel();
    });

    prev.addEventListener('click', () => {
        if (isTransitioning) return;
        index--;
        updateCarousel();
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            if (isTransitioning) return;
            index = i + visibleImages;
            updateCarousel();
        });
    });

    // Auto-play
    let autoPlay = setInterval(() => next.click(), 5000);
    const resetAutoPlay = () => {
        clearInterval(autoPlay);
        autoPlay = setInterval(() => next.click(), 5000);
    };
    [next, prev, ...dots].forEach(el => el.addEventListener('click', resetAutoPlay));
});