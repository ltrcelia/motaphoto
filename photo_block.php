<?php get_header(); ?>

<section id="container" class="photo-grid">
    <?php
    $args = array(
        'post_type' => 'photos',
        'posts_per_page' => -1 
    );

    // Exécute la requête
    $photos_query = new WP_Query($args);

    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            if (has_post_thumbnail()) :
    ?>
                <div class="photo">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
    <?php
            endif;
        endwhile;
        wp_reset_postdata();
    else :
        echo 'Aucune photo trouvée.';
    endif;
    ?>
</section>

<?php get_footer(); ?>