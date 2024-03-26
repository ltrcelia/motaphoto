<?php
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    $prev_thumbnail = get_the_post_thumbnail($prev_post, 'thumbnail');
    $next_thumbnail = get_the_post_thumbnail($next_post, 'thumbnail');
?>
<div id="container-photo">
    <div class="hover-photo">
        <div id="prev-photo">
        <?php echo get_the_post_thumbnail($prev_post, 'thumbnail'); ?>
        </div>
        <div id="next-photo">
            <?php echo get_the_post_thumbnail($next_post, 'thumbnail'); ?>
        </div>
    </div>
    
</div>

<div id="arrows">
    <?php if ($prev_post) : ?>
    <div id="prev-arrow">
        <a href="<?php echo get_permalink($prev_post); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/small-prev-arrow.png" alt="Flèche vers la gauche" id="prev">
        </a>
    </div>
    <?php endif; ?>

    <?php if ($next_post) : ?>
    <div id="next-arrow">
        <a href="<?php echo get_permalink($next_post); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/small-next-arrow.png" alt="Flèche vers la droite" id="next">
        </a>
    </div>
    <?php endif; ?>
    
</div>