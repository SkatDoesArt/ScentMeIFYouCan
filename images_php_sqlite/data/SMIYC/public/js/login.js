/* 
 * Script pour gérer l'animation de bascule entre les formulaires (Sign In/Sign Up)
 */

// Sélection des conteneurs principaux et des éléments de bascule
const switchCtn = document.querySelector("#switch-cnt");
const switchC1 = document.querySelector("#switch-c1");
const switchC2 = document.querySelector("#switch-c2");
const switchCircle = document.querySelectorAll(".switch__circle");

// Sélection des conteneurs de formulaires
const aContainer = document.querySelector("#a-container"); // Formulaire d'inscription
const bContainer = document.querySelector("#b-container"); // Formulaire de connexion

// Sélection de tous les boutons de soumission pour désactiver l'action par défaut
const allSubmitButtons = document.querySelectorAll(".submit");

// Sélection des boutons de bascule (qui se trouvent dans le panneau switch)
// (Utilise les IDs ajoutés dans le HTML pour plus de clarté)
const toSignInButton = document.querySelector("#switch-c1 .switch-btn");
const toSignUpButton = document.querySelector("#switch-c2 .switch-btn");

/**
 * Empêche l'action par défaut du formulaire (soumission/rechargement de page)
 * Note: Cela doit être retiré une fois la gestion PHP/Ajax mise en place.
 * @param {Event} e L'événement du clic
 */
const preventDefaultAction = (e) => e.preventDefault();


/**
 * Gère le changement d'état (bascule entre Inscription et Connexion)
 */
let isSignIn = true; // État initial: true = Sign In, false = Sign Up
const changeForm = () => {

    // 1. Déclenche l'animation 'is-gx' (animation de pulsation du switch)
    switchCtn.classList.add("is-gx");
    setTimeout(function () {
        switchCtn.classList.remove("is-gx");
    }, 100); // La durée doit correspondre à la durée de l'animation CSS (1.25s + marge)

    // 2. Bascule les classes pour le mouvement principal et les cercles
    switchCtn.classList.toggle("is-txr"); // Déplacement du panneau switch vers la droite

    /* switchCircle.forEach(circle => {
        circle.classList.toggle("is-txr"); // Déplacement des cercles
    }); */

    // 3. Bascule la visibilité des textes d'accueil
    switchC1.classList.toggle("is-hidden");
    switchC2.classList.toggle("is-hidden");

    // 4. Déplace et change la profondeur des conteneurs de formulaires
    aContainer.classList.toggle("hidden");
    bContainer.classList.toggle("hidden");
    bContainer.classList.toggle("is-txl");
    aContainer.classList.toggle("is-txl"); // Déplacement des conteneurs de formulaires

    isSignIn = !isSignIn; // Inverse l'état
    bContainer.classList.toggle("is-z200"); // Met le conteneur B au-dessus (z-index)
}


/**
 * Fonction principale pour attacher les écouteurs d'événements
 */
const mainF = () => {
    // Empêche la soumission des formulaires (pour l'animation)
    /* allSubmitButtons.forEach(button => {
        button.addEventListener("click", preventDefaultAction);
    }); */

    // Attache l'événement de bascule aux boutons "SIGN IN" et "SIGN UP" du panneau switch
    toSignInButton.addEventListener("click", changeForm);
    toSignUpButton.addEventListener("click", changeForm);
}

// Déclenche la fonction principale lorsque le DOM est chargé
window.addEventListener("load", mainF);