<div id="lightbox">
    <span id="fixed" class="close">&times;</span>
    <div class="bloc-nav">
        <div class="arrow-prev" id="fixed">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/arrow-left-white.png" alt="Image d'une flèche précédente">
            <p>Précédente</p>
        </div>
        <div class="arrow-next" id="fixed">
            <p>Suivante</p>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/arrow-right-white.png" alt="Image d'une flèche suivante">
        </div>
    </div>
    
    <div class="container-image-infos">
        <div class="bloc-image">
            <img id="lightbox-image" src="" class="article-image" alt="Image en plein écran">
        </div>
        <div class="infos-title-tax">
            <p class="info-title"><?php the_title(); ?></p>
            <p class="info-tax"><?php echo get_field('categories', get_the_ID()); ?></p>
        </div>
    </div>
</div>