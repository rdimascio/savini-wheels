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
	<div class="gallery-item" data-vehicle-id="<?php the_ID(); ?>" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)">
		<div class="overlay">
		</div>
		<a href="<?= get_the_permalink(); ?>" class="link"></a>
	</div>
	<div class="content">
		<h4><?= the_title(); ?></h4>
	</div>
</div>
