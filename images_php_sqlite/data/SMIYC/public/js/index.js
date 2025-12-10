document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');

    menuToggle.addEventListener('click', function () {
        navList.classList.toggle('active');
    });
});

const goShoppingLink = document.getElementById("go-shopping-link");
const background = document.getElementById("home");
const navbar = document.getElementById("header")
const body = document.body;

goShoppingLink.addEventListener("click", function () {
    body.style.overflow = "scroll";
    setTimeout(function () {
        background.style.display = "none";
    }, 200); // le temps qu'il faut pour le scroll smooth (200 milisecondes = 0.2 sec)
});





