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


// Charger plus

// fin 


// lightbox
const lightbox = document.getElementById('lightbox');
const iconeFullscreen = document.getElementById('icone-fullscreen');
const closeCross = document.querySelector('.close')

document.addEventListener('DOMContentLoaded', function () {
    iconeFullscreen.addEventListener('click', function(event) {
        event.preventDefault(); 
        lightbox.style.display = 'block'; 
    });
    closeCross.addEventListener('click', function() {
        lightbox.style.display = 'none'; 
    });
});