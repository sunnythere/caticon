<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main2" role="main">

    <header class="page-header">
      <h1 class="page-title">Schedule</h1>
    </header><!-- .page-header -->

    <?php
      $args = array(
        'post_type' => 'caticon_event',
        'posts_per_page' => 10,
        'orderby' => 'meta_value',
        'meta_key' => 'caticon_event_date',
        'order' => 'ASC',
        );
      $loop = new WP_Query( $args );

      /* LOOOOOOOOP */
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();


        get_template_part( 'template-parts/content', 'event' );

      endwhile;

        the_posts_navigation();
      //the_posts_pagination();

      else:
        get_template_part( 'template-parts/content', 'none' );

      endif; ?>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
