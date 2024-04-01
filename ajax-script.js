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