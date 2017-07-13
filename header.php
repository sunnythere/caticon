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

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Allan's logo <br/>here</a></h1>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<?php
					$items = array(
			      'About' => 'about',
			      'Schedule' => 'events',
			      'Sponsors' => 'sponsors'
			    );
					$menu_main = array( $items, 'h5' );
					$menu_small = array( $items, 'p' );

					$menu_print = function($menu_arr, $tag_size) {
						$result = '<ul>';
						foreach ($menu_arr as $item=>$item_value) {
							$result = $result . '<li><' . $tag_size . '><a href="/' . $item_value . '">' . $item . '</a></' . $tag_size . '></li>';
						}
						$result = $result . '</ul>';
						print($result);
					}
				?>

				<div id="sticky-header">
					<span id="sticky-title"><h4><?php bloginfo( 'name' ); ?></h4></span>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php $menu_print($items, 'p'); ?>
					</button>
				</div>
				<!-- no walker, what -->
				<div class="menu-main-container">
					<?php $menu_print($items, 'h5'); ?>
				</div>


			</nav><!-- #site-navigation -->

			<div id="presentedBy"><a href="http://catcafebk.com" target="_blank"><img src="<?php echo get_theme_file_uri() . '/img/presentedby.svg'; ?>" /></a>
			</div>
		</header><!-- #masthead -->

		<span id="shards"><img src="<?php echo get_theme_file_uri() . '/img/shards.svg'; ?>" /></span>

		<div id="shards2"><img src="<?php echo get_theme_file_uri() . '/img/shards2.svg'; ?>" /></div>

		<div id="content" class="site-content">
