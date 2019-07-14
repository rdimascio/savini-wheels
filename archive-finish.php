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
			<h1>Finish Gallery</h1>
		</header><!-- .page-header -->

		<div class="filters finish-filters">
			<div class="filter-group">
				<label for="brand_options">Brand options</label>
				<select class="select" id="collection" name="brand_options" id="brand_options" data-filter="collection">
					<option value="all">All Collections</option>
					<?php 
							$_terms = get_terms( 'wheel_collections', array( 'hide_empty' => false ) );

							foreach ($_terms as $term) : 
							
								$slug = $term->slug;
								$name = $term->name;
								
							?>

								<option value="<?= $slug ?>"><?= $name ?></option>

							<?php endforeach;
						?>
				</select>
			</div>
			<div class="filter-group">
				<label for="color_options">Color options</label>
				
					<select class="select" id="color" name="color_options" id="color_options" data-filter="color">
						<option value="all">All Colors</option>
						<?php 
							$_terms = get_terms( 'finish_colors', array( 'hide_empty' => false ) );

							foreach ($_terms as $term) : 
							
								$slug = $term->slug;
								$name = $term->name;
								
							?>

								<option value="<?= $slug ?>"><?= $name ?></option>

							<?php endforeach;
						?>
					</select>
			</div>
			<div class="filter-group">
				<label for="finish_options">Finish options</label>
					<select class="select" id="options" name="finish_options" id="finish_options" data-filter="options">
						<option value="all">All Finishes</option>
						<?php 
							$_terms = get_terms( 'finish_options', array( 'hide_empty' => false ) );

							foreach ($_terms as $term) : 
							
								$slug = $term->slug;
								$name = $term->name;
								
							?>

								<option value="<?= $slug ?>"><?= $name ?></option>

							<?php endforeach;
						?>
					</select>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

			<div class="finish-grid grid flex justify-start align-center" id="finishGrid">

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

		<?php

		global $wp_query;
						
		if (  $wp_query->max_num_pages > 1 ) : ?>
			<div class="load-more-wrapper">
				<div id="finish_load_more" class="load-more">Load More</div>
			</div>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
