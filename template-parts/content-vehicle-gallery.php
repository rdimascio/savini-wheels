<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<div class="gallery-wrapper">
	<a href="<?= get_the_post_thumbnail_url(); ?>" class="gallery-item__link"></a>
		<div class="gallery-item" data-vehicle-id="<?php the_ID(); ?>" data-src="<?= get_the_post_thumbnail_url(); ?>" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)">
			<div class="overlay">
				<div class="content">
					<h4><?= the_title(); ?></h4>
					<p class="see-more">See More</p>
				</div>
			</div>
		</div>
	</a>
</div>