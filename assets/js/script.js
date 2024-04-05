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




// REQUETES AJAX
// requete ajax load more
jQuery(document).ready(function ($) {
    var page = 1;
    
    $('#load-more-btn').on('click', function(event) {
        event.preventDefault();
        page++;

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                page: page
            },
            success: function(response) {
                if (response) {
                    $('.grid').append(response);
                } else {
                    $("#load-more-btn").hide();
                }
            }
        });
    });
});
// fin


// requete ajax filters
jQuery(document).ready(function($) {
    $('#select-categories, #select-formats, #selectCustomField').change(function() {
        
        var category = $('#select-categories').val();
        var format = $('#select-formats').val();
        var orderby = $('#selectCustomField').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                orderby: orderby
            },
            success: function(response) {
                $('.grid').html(response);
            }
        });
    });
});
//fin