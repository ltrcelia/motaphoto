// modal contact
const modal = document.getElementById('myModal');
const contactLink = document.querySelector('nav a[href="#contact"]');
const contactLinkBurger = document.querySelector('#menu-burger a[href="#contact"]');
const menuLiens = document.querySelectorAll('a');
// const btnContact = document.querySelector('.btn-contact')

document.addEventListener('DOMContentLoaded', function () {

    contactLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        modal.style.display = 'block'; 
    });
    contactLinkBurger.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });
    // btnContact.addEventListener('click', function(event) {
    //     event.preventDefault();
    //     modal.style.display = 'block';
    // });
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
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
