const lightbox = document.getElementById('lightbox');
const iconeFullscreen = document.getElementById('icone-fullscreen');
const closeCross = document.querySelector('.close')

// ouverture fermeture lightbox
document.addEventListener('DOMContentLoaded', function () {
    iconeFullscreen.addEventListener('click', function(event) {
        event.preventDefault(); 
        lightbox.style.display = 'block'; 
    });
    closeCross.addEventListener('click', function() {
        lightbox.style.display = 'none'; 
    });
}); 
// fin


// mise à jour infos et images
jQuery(document).ready(function($) {
    $('.overlay-image #icone-fullscreen').on('click', function(e) {
        e.preventDefault();
        var postImage = $(this).closest('.photo').find('.article-image').attr('src');
        var postTitle = $(this).closest('.photo').find('.info-title').text();
        var postCat = $(this).closest('.photo').find('.info-tax').text();
        
        $('#lightbox .bloc-image img').attr('src', postImage);
        $('#lightbox .info-title').text(postTitle);
        $('#lightbox .info-tax').text(postCat);

        $('#lightbox').show();
    });
});
// fin