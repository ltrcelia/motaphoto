// modal contact
const modal = document.getElementById('myModal');
const contactLink = document.querySelector('nav a[href="#contact"]');
const contactLinkBurger = document.querySelector('#menu-burger a[href="#contact"]');
const menuLiens = document.querySelectorAll('a');
const btnContact = document.querySelector('.btn-contact');

document.addEventListener('DOMContentLoaded', function () {

    contactLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        modal.style.display = 'block'; 
    });
    contactLinkBurger.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });

    if (btnContact) {
        btnContact.addEventListener('click', function(event) {
            event.preventDefault();
            modal.style.display = 'block';
        });
    }
});
// fin 


// menu burger
const btnBurger = document.getElementById('btn');
const menuBurger = document.getElementById('menu-burger');

btnBurger.addEventListener('click', () => {
    btnBurger.classList.toggle('active');
    menuBurger.classList.toggle('open');
});
menuLiens.forEach(link => {
    link.addEventListener('click', () => {
      btnBurger.classList.remove('active');
      menuBurger.classList.remove('open');
    });
  });
// fin


// lien navigation < >
const arrowLeft = document.getElementById('prev-arrow');
const arrowRight = document.getElementById('next-arrow');
const containerPhoto = document.getElementById('container-photo');
const prevPhoto = document.getElementById('prev-photo');
const nextPhoto = document.getElementById('next-photo');

if (arrowLeft) {
    arrowLeft.addEventListener('mouseover', () => {
        containerPhoto.style.opacity = '1';
    });
};
if (arrowLeft) {
    arrowLeft.addEventListener('mouseout', () => {
        containerPhoto.style.opacity = '0';
    });
};
if (arrowRight) {
    arrowRight.addEventListener('mouseover', () => {
        containerPhoto.style.opacity = '1';
    });
};
if (arrowRight) {
    arrowRight.addEventListener('mouseout', () => {
        containerPhoto.style.opacity = '0';
    });
};
// fin 

jQuery(document).ready(function($) {
    // Cache toutes les miniatures lors du chargement de la page
    $('#prev-photo, #next-photo').hide();

    // Gére l'affichage des miniatures au survol
    $('#prev-arrow').hover(function() {
        $('#prev-photo').show();
    }, function() {
        $('#prev-photo').hide();
    });

    $('#next-arrow').hover(function() {
        $('#next-photo').show();
    }, function() {
        $('#next-photo').hide();
    });
});
// Charger plus

// fin 

