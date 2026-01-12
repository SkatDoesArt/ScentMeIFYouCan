const cards = document.querySelectorAll(".card");
const dots = document.querySelectorAll(".dot");
const memberName = document.querySelector(".member-name");
const memberRole = document.querySelector(".member-role");
const btnPrev = document.getElementById("prevBtn");
const btnNext = document.getElementById("nextBtn");

let currentIndex = 0;
let isAnimating = false;

function updateCarousel(newIndex) {
    if (isAnimating || cards.length === 0) return;
    isAnimating = true;

    currentIndex = (newIndex + cards.length) % cards.length;

    cards.forEach((card, i) => {
        const offset = (i - currentIndex + cards.length) % cards.length;
        card.classList.remove("center", "up-1", "up-2", "down-1", "down-2", "hidden");

        if (offset === 0) card.classList.add("center");
        else if (offset === 1) card.classList.add("down-1");
        else if (offset === 2) card.classList.add("down-2");
        else if (offset === cards.length - 1) card.classList.add("up-1");
        else if (offset === cards.length - 2) card.classList.add("up-2");
        else card.classList.add("hidden");
    });

    dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === currentIndex);
    });

    // Mise à jour des textes
    const brandEl = document.querySelector(".member-brand");
    const prestigeEl = document.querySelector(".member-prestige");

    if (memberName && typeof teamMembers !== 'undefined' && teamMembers[currentIndex]) {
        const data = teamMembers[currentIndex];
        
        // Animation simple de fondu
        [memberName, brandEl, memberRole, prestigeEl].forEach(el => { if(el) el.style.opacity = "0" });

        setTimeout(() => {
            memberName.textContent = data.name;
            if(brandEl) brandEl.textContent = data.brand;
            if(memberRole) memberRole.textContent = data.role;
            if(prestigeEl) prestigeEl.innerHTML = data.prestige;

            [memberName, brandEl, memberRole, prestigeEl].forEach(el => { if(el) el.style.opacity = "1" });
        }, 300);
    }

    setTimeout(() => { isAnimating = false; }, 800);
}

// Event Listeners
if(btnPrev) btnPrev.addEventListener("click", () => updateCarousel(currentIndex - 1));
if(btnNext) btnNext.addEventListener("click", () => updateCarousel(currentIndex + 1));

dots.forEach((dot, i) => {
    dot.addEventListener("click", () => updateCarousel(i));
});

// Initialisation
if (cards.length > 0) {
    updateCarousel(0);
}