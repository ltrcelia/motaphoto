jQuery(document).ready(function ($) {
    var photos = [];
    var page = 1;
    
    function addPhoto(imageSrc, title, category) {
        photos.push({
            imageSrc: imageSrc,
            title: title,
            category: category,
        });
    }

    function photoContainer(container) {
        container.find('.overlay-image').each(function() {
            var postImage = $(this).find('.article-image').attr('src');
            var postTitle = $(this).find('.info-title').text();
            var postCat = $(this).find('.info-tax').text();
            addPhoto(postImage, postTitle, postCat);
        });
    }
    photoContainer($('body'));

    $('body').on('click', '.arrow-prev, .arrow-next', function() {
        var currentIndex = photos.findIndex(function(photo) {
            return photo.imageSrc === $('#lightbox .bloc-image img').attr('src');
        });
        var newIndex;
        if ($(this).hasClass('arrow-prev')) {
            newIndex = (currentIndex - 1 + photos.length) % photos.length;
        } else {
            newIndex = (currentIndex + 1) % photos.length;
        }
        displayPhoto(newIndex);
    });

    function displayPhoto(index) {
        $('#lightbox .bloc-image img').attr('src', photos[index].imageSrc);
        $('#lightbox .info-title').text(photos[index].title);
        $('#lightbox .info-tax').text(photos[index].category);
    }

    $('body').on('click', '.overlay-image #icone-fullscreen', function(e) {
        e.preventDefault();
        var postImage = $(this).closest('.photo').find('.article-image').attr('src');
        var postTitle = $(this).closest('.photo').find('.info-title').text();
        var postCat = $(this).closest('.photo').find('.info-tax').text();

        $('#lightbox .bloc-image img').attr('src', postImage);
        $('#lightbox .info-title').text(postTitle);
        $('#lightbox .info-tax').text(postCat);

        $('#lightbox').show();
    });

    $('#lightbox .close').on('click', function() {
        $('#lightbox').hide();
    });

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
                    photoContainer($('.grid'));
                } else {
                    $("#load-more-btn").hide();
                }
            }
        });
    });
});