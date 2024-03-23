<?php get_header(); ?>
<main>
    <section id="container">

        <div class="container-infos">

            <article id="post-<?php the_ID(); ?>" class="article-infos" <?php post_class(); ?>>
                <div class="infos">
                    <?php
                        $args = array(
                            'post_type' => 'photo',
                            'posts_per_page' => 1,
                        );

                        $photos_query = new WP_Query($args);
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                    ?>
                <h2><?php the_title(); ?></h2>
                <p class="description">Référence : <?php echo get_field('reference'); ?></p>
                <p class="description">Catégorie :
                    <?php $categories = get_terms(array(
                        'taxonomy' => 'categorie',
                        'object_ids' => get_the_ID(),));
                    if (!empty($categories)) {
                        foreach ($categories as $categorie) {
                            echo $categorie->name; } } ?> </p>
                <p class="description">Format :
                    <?php $formats = get_terms(array(
                        'taxonomy' => 'format',
                        'object_ids' => get_the_ID(), ));
                    if (!empty($formats)) {
                        foreach ($formats as $format) {
                            echo $format->name . ' '; } } ?> </p>
                <p class="description">Type : <?php echo get_field('type'); ?></p>
                <p class="description">Année : <?php echo get_the_date('Y'); ?></p>
                </div>
            </article>
        
        <img id="photo" src="<?php the_post_thumbnail_url(); ?>">
        <?php endwhile;
            else :
                echo 'Aucun article trouvé.';
            endif;
            wp_reset_postdata(); ?>

        </div>

        <section class="contact-nav">
            <div class="contact">
                <p>Cette photo vous intéresse ?</p>
                <button class="btn btn-contact">Contact</button>
                <script>
                    jQuery(".btn-contact").click(function () {
                        let referenceValue = "<?php echo get_field('reference'); ?>";
                        jQuery('[name="your-subject"]').val(referenceValue);
                    });
                </script>
            </div>

            <div id="navigation"> 
                <div id="container-photo">
                    <?php get_template_part('templates_part/photo_block'); ?>
                </div>
                
                <div id="arrows">
                    <div href="" id="prev-arrow">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/small-prev-arrow.png" alt="Flèche vers la gauche" id="prev">
                    </div>
                    
                    <div href="" id="next-arrow">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/small-next-arrow.png" alt="Flèche vers la droite" id="next">
                    </div>
                </div>
            </div>

        </section>
        

    </section>


    <section class="container-photo">
        <h3>vous aimerez aussi</h3>
        <div class="related-photo">
        <?php
            $current_post_id = get_the_ID();
            $current_cat_terms = get_the_terms($current_post_id, 'categorie');

            if (!empty($current_cat_terms) && !is_wp_error($current_cat_terms)) {
                $current_cat_slug = array();
                foreach ($current_cat_terms as $term) {
                    $current_cat_slug[] = $term->slug;
                }

            $args = array(
                'post_type' => 'photo',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post__not_in' => array($current_post_id),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $current_cat_slug,
                    ),
                ),
            );
            $related_photos_query = new WP_Query($args);

                if ($related_photos_query->have_posts()) {
                    while ($related_photos_query->have_posts()) {
                        $related_photos_query->the_post();
                        include('templates_part/photo_block.php');
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Aucune photo similaire trouvée.';
                }
            }
            ?>
        </div>
    </section>

</main>


<?php get_footer(); ?>