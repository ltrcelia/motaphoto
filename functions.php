<?php 
// inclure style css
function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


// inclure scripts javascript
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('lightbox-scripts', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// inclure scripts ajax
function my_enqueue_scripts() {
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/ajax-script.js', array('jquery'));
    wp_localize_script('ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


// inclure menus
function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );

?>