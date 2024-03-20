<div class="photo">
    <a href="<?php echo get_permalink(); ?>">
        <?php the_post_thumbnail(); ?>
        <div class="overlay">
            <i class="fas fa-eye"></i>
            <i class="fas fa-expand"></i>
        </div>
        <!-- <h3><?php the_title(); ?></h3>
        <p class="description">Catégorie :
            <?php $categories = get_terms(array(
                'taxonomy' => 'categorie',
                'object_ids' => get_the_ID(),
            ));
            if (!empty($categories)) {
                foreach ($categories as $categorie) {
                    echo $categorie->name; } } ?> </p> -->
    </a>
</div>
