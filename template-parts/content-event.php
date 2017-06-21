<?php
/**
 * Template part for displaying event posts
 *
 * @package caticon
 */

?>

<article id="post-<?php the_ID(); ?>" class="event-entry">
  <header class="event-header">
    <?php
    //datetime

    if ( is_single() ) :
      the_title( '<h1 class="event-title">', '</h1>' );
    else :
      // the_title( '<h3 class="event-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
      the_title( '<p class="event-title">', '</p>' );

      if ( taxonomy_exists('age') ) {
        $age_terms = get_the_terms( $post->ID, 'age');
        if (! empty( $age_terms) && ! is_wp_error( $age_terms )) {
          foreach ($age_terms as $age) {
            echo '<p class="event-age">' . $age->name . '</p>';
          }
        }
      };

      if ( taxonomy_exists('cost') ) {
        $cost_terms = get_the_terms( $post->ID, 'cost');
        if (! empty( $cost_terms) && ! is_wp_error( $cost_terms )) {
          foreach ($cost_terms as $cost) {
            echo '<p class="event-cost">Cost: ' . $cost->name . '</p>';
          }
        }
      };

    endif; ?>
  </header><!-- .entry-header -->

  <div class="event-thumb">
    <?php
      if ( has_post_thumbnail() ) :
        $featured_img = get_the_post_thumbnail();
        echo '<div class="event-img">' . $featured_img . '</div>';
      else:
        echo '<div class="event-img-empty"> &nbsp; </div>';
      endif; ?>
  </div>

  <div class="event-content">
    <?php

      the_content( //sprintf(
        // wp_kses(
        //  /* translators: %s: Name of current post. */
        //   __,
        //  array(
        //    'span' => array(
        //      'class' => array(),
        //    ),
        //  )
        //)
      //)
       );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'caticon' ),
        'after'  => '</div>',
      ) );


    ?>
  </div><!-- .entry-content -->


</article><!-- #post-## -->
