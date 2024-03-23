<?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    );

    $photos_header_query = new WP_Query($args);
    if ($photos_header_query->have_posts()) :
        while ($photos_header_query->have_posts()) : $photos_header_query->the_post();
        $image_url = get_the_post_thumbnail_url();
        endwhile;
    endif;
?>
        <img src="<?php echo $image_url; ?>" alt="Image de l'entête" id="hero">
        <h1>photographe event</h1>