<?php
/**
 * Template part for displaying event posts
 *
 * @package caticon
 */

if ( is_single() ) :
  $article_class = "event-entry-single";
else:
  $article_class = "event-entry";
endif;

echo '<article id="post-', the_ID(), '" class="', $article_class, '">';
?>

  <header class="event-header">
    <?php

    $date = get_post_meta( $post->ID, 'caticon_event_date', true );
    $start_time = get_post_meta( $post->ID, 'caticon_event_start', true );
    $end_time = get_post_meta( $post->ID, 'caticon_event_end', true );

    if ( ! empty( $date ) ) {
      $the_date = mysql2date( 'l, F j, Y', $date );
      $date_time = '<h6 class="event-datetime">' . $the_date . '&nbsp; <img src="' . get_theme_file_uri() . '/img/smallcat.min.svg" /> &nbsp;';

      if ( ! empty( $start_time) ) {
        $the_start_time = mysql2date('g:i a', $start_time);
        $date_time = $date_time  . $the_start_time;
      }

      if ( ! empty( $end_time ) ) :
        $the_end_time = mysql2date('g:i a', $end_time );
        $date_time = $date_time . ' – ' /*this is an en-dash, (option + hyphen)*/ . $the_end_time . '</h6>';
      else :
        $date_time = $date_time . '</h6>';
      endif;

      echo $date_time;

    };

    //list all meta data, for testing:
    //the_meta();

    if ( is_single() ) :
      the_title( '<h1 class="event-title">', '</h1>' );
    else :
      // the_title( '<h3 class="event-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
      the_title( '<p class="event-title"><big><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></big></p>' );

      if ( taxonomy_exists('age') ) {
        //get_the_term_list()
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

    ?>

  </div><!-- .entry-content -->


</article><!-- #post-## -->
