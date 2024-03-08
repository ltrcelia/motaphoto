<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">
    <script defer src="<?php echo get_template_directory_uri() ?>/assets/js/script.js"></script>

</head>

<body>
	<header>
        
        <nav id="primary-navigation">
            <img class="logo" src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Logo du site MotaPhoto">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'menu_class' => 'menu',
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
            'menu_class' => 'menu',
            ) ); ?>
        </div>

	</header>