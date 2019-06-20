<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

( get_field( 'contact_page_header_color', 'option' ) ) ? get_header( 'dark' ) : get_header();
?>

	<div id="primary" class="content-area contact" style="background-image: url(<?= get_field( 'contact_page_background', 'option' ); ?>)">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page-contact' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
( get_field( 'contact_page_footer_color', 'option' ) ) ? get_footer( 'dark' ) : get_footer();
