<?php get_header(); ?>


<main>

    <section class="hero-header">
        <img id="hero" src="http://localhost:8888/Nathalie-Mota/wp-content/uploads/2024/03/nathalie-11-scaled.jpeg" alt="Pleins de personnes rassemblées pour un évenement">
        <h1>photographe event</h1>
    </section>

    <div class="grid">
    <?php
        error_log(print_r($photos_query, true));
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => -1, 
                    'order' => 'ASC',
                ); 
            $photos_query = new WP_Query($args);

                if ($photos_query->have_posts()) {
                    while ($photos_query->have_posts()) {
                        $photos_query->the_post();
                        include('templates_part/photo_block.php');
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Aucune photo similaire trouvée.';
                }
            ?>
    </div>

</main>


<?php get_footer(); ?>