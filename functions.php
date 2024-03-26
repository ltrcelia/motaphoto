<?php 

function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
    wp_enqueue_script('lightbox-scripts', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


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