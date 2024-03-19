<?php 

function enqueue_theme_assets() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');


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