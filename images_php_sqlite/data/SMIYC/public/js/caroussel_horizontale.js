const cards = document.querySelectorAll(".card");
const dots = document.querySelectorAll(".dot");
const memberName = document.querySelector(".member-name");
const memberRole = document.querySelector(".member-role");
const brandEl = document.querySelector(".member-brand");
const prestigeEl = document.querySelector(".member-prestige");
const btnPrev = document.getElementById("prevBtn");
const btnNext = document.getElementById("nextBtn");
// On récupère la section de contrôle pour gérer sa priorité
const controlsSection = document.querySelector(".controls-section");

let currentIndex = 0;
let isAnimating = false;

function updateCarousel(newIndex) {
    if (isAnimating || cards.length === 0) return;
    isAnimating = true;

    // SÉCURITÉ : On s'assure que la section de droite est prioritaire durant l'animation
    if (controlsSection) controlsSection.style.zIndex = "1000";

    currentIndex = (newIndex + cards.length) % cards.length;

    cards.forEach((card, i) => {
        const offset = (i - currentIndex + cards.length) % cards.length;
        card.classList.remove("center", "left-1", "left-2", "right-1", "right-2", "hidden");

        if (offset === 0) {
            card.classList.add("center");
        } else if (offset === 1) {
            card.classList.add("right-1");
        } else if (offset === 2) {
            card.classList.add("right-2");
        } else if (offset === cards.length - 1) {
            card.classList.add("left-1");
        } else if (offset === cards.length - 2) {
            card.classList.add("left-2");
        } else {
            card.classList.add("hidden");
        }
    });

    dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentIndex);
    });

    if (typeof teamMembers !== 'undefined' && teamMembers[currentIndex]) {
        const data = teamMembers[currentIndex];
        
        [memberName, brandEl, memberRole, prestigeEl].forEach(el => { if(el) el.style.opacity = "0" });

        setTimeout(() => {
            if(memberName) memberName.textContent = data.name;
            if(brandEl) brandEl.textContent = data.brand;
            if(memberRole) memberRole.textContent = data.role;
            if(prestigeEl) prestigeEl.innerHTML = data.prestige;

            [memberName, brandEl, memberRole, prestigeEl].forEach(el => { if(el) el.style.opacity = "1" });
        }, 300);
    }

    setTimeout(() => { 
        isAnimating = false; 
        if (controlsSection) controlsSection.style.zIndex = "100";
    }, 800);
}

if(btnPrev) btnPrev.addEventListener("click", () => updateCarousel(currentIndex - 1));
if(btnNext) btnNext.addEventListener("click", () => updateCarousel(currentIndex + 1));

dots.forEach((dot, i) => {
    dot.addEventListener("click", () => updateCarousel(i));
});

if (cards.length > 0) {
    updateCarousel(0);
}