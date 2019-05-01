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
	<div class="gallery-item" data-finish-id="<?php the_ID(); ?>" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)">
		<div class="overlay">
			<div class="content">
				<h4><?= the_title(); ?></h4>
				<p class="see-more">See More</p>
			</div>
		</div>
		<a href="<?= get_the_permalink(); ?>" class="link"></a>
	</div>
</div>