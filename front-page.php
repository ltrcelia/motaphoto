<?php get_header(); ?>


<main>

    <section class="hero-header">
        <?php get_template_part( 'templates_part/header_model' ); ?>
    </section>

    <section class="gallery">
        <?php get_template_part( 'templates_part/categories_model' ); ?>
        <div class="grid">
            <?php
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 8, 
                    'orderby' => 'date',
                    'order' => 'ASC',
                ); 
                $photos_query = new WP_Query($args);
                if ($photos_query->have_posts()) {
                    while ($photos_query->have_posts()) {
                        $photos_query->the_post();
                        get_template_part('templates_part/photo_block');
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Aucune photo similaire trouvée.';
                }
            ?>
        </div>

        <div class="load-more">
            <button id="load-more-btn" class="btn">Charger plus</button>
        </div>

    </section>

</main>

<?php get_footer(); ?>