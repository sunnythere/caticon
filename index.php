<?php
/**
 * 1 or 2 required files
 * displays a page when nothing more specific matches a query
 *
 * @package caticon
 */

get_header(); ?>
  <div id="intro">
    <p>The Brooklyn Cat Cafe proudly presents <strong>Caticon 2017</strong>, a celebration of comics and cats!</p>
  </div>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

    <div class="subheading"><h6>Upcoming Events</h6></div>

      <?php
        $today = date('Y-m-d');
        $args = array(
          'post_type' => 'caticon_event',
          'posts_per_page' => 5,
          'orderby' => 'meta_value',
          'meta_key' => 'caticon_event_date',
          // 'meta_type' => 'DATE',
          'order' => 'ASC',
          'meta_query' => array(
              array(
                    'key' => 'caticon_event_date',
                    'value' =>  $today,
                    'compare' => '>=',
                    'type' => 'DATE',
              )
          )
        );
        $loop = new WP_Query( $args );

      /* LOOOOOOOOP */
      if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();


        get_template_part( 'template-parts/content', 'event' );

        endwhile;

      else :

        get_template_part( 'template-parts/content', 'none' );

      endif; ?>

      <h6 class="more-link"><a href="<?php echo get_post_type_archive_link( 'caticon_event'); ?>">click to see full schecule...</a></h6>

    </main><!-- #main -->

  </div><!-- #primary -->

<?php

get_template_part( 'template-parts/content', 'bubble' );

get_footer();
