<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <title>Mota photo</title>
</head>

<body>
	<header>
        
        <nav id="primary-navigation">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>">
                <img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Logo du site MotaPhoto">
            </a>
            <?php wp_nav_menu( array(
                'theme_location' => 'primary-menu',
            ) ); ?>
                <div id="btn" class="btn-menu"> 
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
        </nav>

        <div id="menu-burger">
            <?php wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            ) ); ?>
        </div>

	</header>