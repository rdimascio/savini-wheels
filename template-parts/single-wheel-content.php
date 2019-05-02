<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="wheel-wrapper">
		<div class="wheel-content flex justify-center align-center">
			<section class="image flex align-center justify-center">
				<?php wp_starter_theme_post_thumbnail(); ?>
			</section>

			<section class="info flex align-start justify-start">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
			</section>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
