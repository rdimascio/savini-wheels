<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<header class="header archive-header">
			<h1>Latest Blog</h1>
		</header>

		<div class="post-wrapper flex">
			<div class="post-container">
				<div class="post-grid">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content' );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;

					?>
				</div>
				<div class="load-more-wrapper">
					<div id="blog_load_more" class="load-more">Load More</div>
				</div>
			</div>

			<div class="sidebar-wrapper">
				<?php get_sidebar(); ?>
			</div>
		</div>



		</main>
	</div>

<?php
get_footer();
