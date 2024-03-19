<?php get_header(); ?>

<section id="container">

    <div class="container-infos">

        <article id="post-<?php the_ID(); ?>" class="article-infos" <?php post_class(); ?>>
            <div class="infos">
                <?php
                    $args = array(
                        'post_type' => 'photos',
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
                    'object_ids' => get_the_ID(),
                ));
                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        echo $category->name . ' '; } } ?> </p>
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

    <div class="contact">
        <p>Cette photo vous intéresse ?</p>
        <button class="btn-contact">Contact</button>
        <script>
            jQuery(".btn-contact").click(function () {
                let referenceValue = "<?php echo get_field('reference'); ?>";
                jQuery('[name="your-subject"]').val(referenceValue);
            });
        </script>
    </div>

</section>

<section class="container-photo">
    <h3>vous aimerez aussi</h3>
        <?php
        $current_post_id = get_the_ID();
        $current_post_category = get_the_category($current_post_id);

        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 2,
            'order' => 'date',
            'category__not_in' => array($current_post_id),
            'cat' => $current_post_category
        );

        $related_photos_query = new WP_Query($args);

        if (have_posts()) {
            while (have_posts()) {
                the_post();
                include('templates_part/photo_block.php');
            }
            wp_reset_postdata();
        } else {
            echo 'Aucune photo similaire trouvée.';
        }
        ?>

</section>

<?php get_footer(); ?>