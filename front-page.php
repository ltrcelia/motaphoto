<?php get_header(); ?>


<main>

    <section class="hero-header">
        <?php get_template_part( 'templates_part/header_model' ); ?>
    </section>

    <section class="gallery">
        <div class="categories">
            <div class="left-categories">
            <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="tax-cat">
                <select id="select-categories" class="selection">
                <?php $terms = get_terms(array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => false,
                )); ?>
                    <option value="">catégorie</option>
                    <?php foreach ($terms as $term) : ?>
                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </from>
            <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="tax-form">            
                <select id="select-formats" class="selection">
                <?php $terms = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                )); ?>
                    <option value="">formats</option>
                    <?php foreach ($terms as $term) : ?>
                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php endforeach; ?>
            </form>
                </select>
            </div>

            <div class="right-categories">
            <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="date"> 
                <select id="selectCustomField" class="selection">
                    <option value="">trier par</option>
                    <option value="">plus récentes</option>
                    <option value="">plus anciennes</option>
                </select>
            </form>
            </div>
            
        </div>


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
                        include('templates_part/photo_block.php');
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Aucune photo similaire trouvée.';
                }
            ?>
        </div>

    </section>

    <div class="load-more">
        <button id="load-more-btn" class="btn">Charger plus</button>
    </div>

</main>


<?php get_footer(); ?>