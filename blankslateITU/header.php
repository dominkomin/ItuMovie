<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
</head>
<body <?php body_class(); ?>>

    <div class="wrap">

              <header>
                <div class="mainLogoContainer" style="background-image: url(img/cinemaBackgroundllbiggerOpc.jpg); background-color: red">
                    <a href="/wordpress">
                        <img src="img/logoWhite.png" alt="" />
                    </a>
                    <div class="myMenu">
                        <div class="menuLine"></div>
                        <div class="menuLine"></div>
                        <div class="menuLine"></div>
                    </div>
                    <div class="topCentered">
                        <p class="topTitle">Movies</p>
                        <p class="topDescription">You choose the movie we screen it!</p>
                    </div>

                </div>
                <nav class="menuOverlay">
                    <div class="menuContainer">
                        <img src="img/logoWhite.png" alt="" />
                        <div class="myMenu">
                            <div class="rotated45MenuLine"></div>
                            <div class="rotated135MenuLine"></div>
                        </div>
                        <div class="menuContent">
                            <h3>Menu</h3>
                         <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                        </div>
                    </div>
                </nav>

            </header>
	    <div id="container">