<?php
/**
 * Template part for displaying event posts
 *
 * @package caticon
 */

?>

<aside id="bubble">
	<?php

	$args = array(
		'post_type' => 'caticon_bubble',
		'posts_per_page' => 1,
		'orderby' => 'rand',
	);

	$loop = new WP_Query( $args );

	if ( $loop->have_posts() ) {

	 while ( $loop->have_posts() ) :

		$loop->the_post(); ?>


		<?php
		//get picture width
		$bubble_pic = get_posts(array(
				'post_parent' => $post->ID,
				'post_type'   => 'attachment',
				'post_mime_type'  => 'image'));
		if ( $bubble_pic ) {
			$bubble_pic_meta = wp_get_attachment_metadata( $bubble_pic[0]->ID, false);
			$pic_width = $bubble_pic_meta['width'] > 150 ? 150 : $bubble_pic_meta['width'];
		} ?>

		<div id="bubble-center" style="margin: 3% calc((100% - <?php echo $pic_width ?>px - 148px)/2) ;">

			<div class="bubble-text">

				<span>
				<?php the_content( ); ?>
				</span>
			</div><!-- .bubble-text -->

			<div class="bubble-img">
				<?php
					if ( has_post_thumbnail() ) {
						$featured_img = get_the_post_thumbnail();
						echo $featured_img;
					}
				?>
			</div>

		</div>

	<?php endwhile;

	} ?>

</aside><!-- #bubble -->
