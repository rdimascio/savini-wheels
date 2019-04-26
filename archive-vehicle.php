<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<header class="page-header">
			<h1>Vehicle Gallery</h1>
		</header><!-- .page-header -->

		<div class="filters finish-filters">
			
		</div>

		<?php if ( have_posts() ) : ?>

			<div class="vehicle-grid grid flex justify-center align-center">

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
