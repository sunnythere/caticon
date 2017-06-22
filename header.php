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
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Allan's logo here</a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Allan's logo here </a></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div id="sticky-header">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Header Menu', 'caticon' ); ?></button>
				</div>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'header_menu',
					'menu_id'        => 'primary-menu',
					//appended to div that wraps menu element
				) );
			?>
<!-- 				<div id="header-menu">
						<h5><a href="">About</a></h5>
						<h5><a href="">Schedule</a></h5>
						<h5><a href="">Sponsors</a></h5>
				</div> -->
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div id="shards"><img src="<?php echo get_theme_file_uri() . '/img/shards.png'; ?>" /></div>

		<div id="content" class="site-content">
