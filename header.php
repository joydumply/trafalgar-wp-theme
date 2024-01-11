<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site fullpage">

	<header id="masthead" class="site-header">
        <div class="container d-flex align-items-center justify-content-between">
        <?php the_custom_logo(); ?>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu'
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        </div>

	</header><!-- #masthead -->
