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