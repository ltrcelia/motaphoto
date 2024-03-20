<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="<?php echo get_template_directory_uri() ?>/assets/js/script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <?php wp_head(); ?>
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