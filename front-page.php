<?php get_header(); ?>


<main>

    <section class="hero-header">
        <img id="hero" src="http://localhost:8888/Nathalie-Mota/wp-content/uploads/2024/03/nathalie-11-scaled.jpeg" alt="Pleins de personnes rassemblées pour un évenement">
        <h1>photographe event</h1>
    </section>


    <section class="gallery">
        <div class="categories">
            <div class="left-categories">
                <select id="select-categories" class="selection">
                    <option value="">catégorie</option>
                </select>

                <select id="select-formats" class="selection">
                    <option value="">formats</option>
                </select>
            </div>

            <div class="right-categories">
                <select id="selectCustomField" class="selection">
                    <option value="">trier par</option>
                    <option value="">plus récentes</option>
                    <option value="">plus anciennes</option>
                </select>
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