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
    wp_localize_script('ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'max_pages' => $max_pages));
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


// pagination infini
function load_more_photos() {
    $page = $_POST['page'];

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8, 
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $page,
    ); 

    $photos_query = new WP_Query($args);
    if ($photos_query->have_posts()) {
        while ($photos_query->have_posts()) {
            $photos_query->the_post();
            get_template_part('templates_part/photo_block');
        }
        wp_reset_postdata();
    };
    wp_die();
}
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');
// fin


// filtres 
function filter_photos() {
    $category = $_POST['category'];
    $format = $_POST['format'];
    $orderby = $_POST['orderby'];

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => $orderby,
    );
    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category,
        );}
    if (!empty($format)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        );}
    $photos_query = new WP_Query($args);
    if ($photos_query->have_posts()) {
        while ($photos_query->have_posts()) {
            $photos_query->the_post();
            get_template_part('templates_part/photo_block');
        }
        wp_reset_postdata();
    } else {
        echo 'Aucune photo trouvée.';
    }
    wp_die();
}
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');
// fin

?>