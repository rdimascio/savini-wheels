<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<div class="article-wrapper">

	<div class="article" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)">
		<a class="article-link" href="<?= the_permalink() ?>"></a>
	</div>

</div>
