<?php

/**
 * header template
 * contains: <head>, up to <div id="content">
 *
 * @package caticon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'caticon' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Allan's logo here</a></h1>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div id="sticky-header">
					<span id="sticky-title"><h4><?php bloginfo( 'name' ); ?></h4></span>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				</div>
			<?php
				wp_nav_menu( array(
//					'menu'	=> 'primary'
					'theme_location' => 'header_menu',
					'walker'	=> new Caticon_Walker_Nav(),
					//'menu_id'        => 'primary-menu',
					//appended to div that wraps menu element
				) );
			?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<span id="shards"><img src="<?php echo get_theme_file_uri() . '/img/shards.svg'; ?>" /></span>

		<div id="shards2"><img src="<?php echo get_theme_file_uri() . '/img/shards2.svg'; ?>" /></div>

		<div id="content" class="site-content">
