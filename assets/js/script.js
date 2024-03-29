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

// cacher une des deux photos
jQuery(document).ready(function($) {
    $('#prev-photo, #next-photo').hide();

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
// fin


// Charger plus
(function ($) {
    $(document).ready(function () {

        // Chargment des commentaires en Ajax
        $('.js-load-comments').submit(function (e) {

            // Empêcher l'envoi classique du formulaire
            e.preventDefault();

            // L'URL qui réceptionne les requêtes Ajax dans l'attribut "action" de <form>
            const ajaxurl = $(this).attr('action');

            // Les données de notre formulaire
			// ⚠️ Ne changez pas le nom "action" !
            const data = {
                action: $(this).find('input[name=action]').val(), 
                nonce:  $(this).find('input[name=nonce]').val(),
                postid: $(this).find('input[name=postid]').val(),
            }

            // Pour vérifier qu'on a bien récupéré les données
            console.log(ajaxurl);
            console.log(data);

            // Requête Ajax en JS natif via Fetch
            fetch(ajaxurl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: new URLSearchParams(data),
            })
            .then(response => response.json())
            .then(body => {
                console.log(body);

                // En cas d'erreur
                if (!body.success) {
                    alert(response.data);
                    return;
                }

                // Et en cas de réussite
                $(this).hide(); // Cacher le formulaire
                $('.comments').html(body.data); // Et afficher le HTML
            });
        });
        
    });
})(jQuery);
// fin 

