<div class="photo overlay-image">
    <a href="<?php echo get_permalink(); ?>" class="link-container">
        <div class="overlay">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon_eye.png" alt="Icone d'un oeil" id="icone-eye">
            <!-- <a href="" id="link-lightbox"> -->
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon_fullscreen.png" alt="Icone fullscreen" id="icone-fullscreen">
            <!-- </a> -->
            <p class="info-title"><?php the_title(); ?></p>
            <p class="info-tax"><?php $categories = get_terms(array(
                        'taxonomy' => 'categorie',
                        'object_ids' => get_the_ID(),));
                    if (!empty($categories)) {
                        foreach ($categories as $categorie) {
                            echo $categorie->name; } } ?> </p>
        </div>
    </a>
    <img src="<?php the_post_thumbnail_url(); ?>" class="article-image">
</div>