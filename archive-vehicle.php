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

		<div class="filters vehicle-filters">
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
				<label for="make_options">Vehicle options</label>
				<div class="filter-row">
					<select class="select" id="make" name="make_options" id="make_options" data-filter="make">
						<option value="all">All Makes</option>
						<?php 
							$_terms = get_terms( 'vehicle_make', array( 'hide_empty' => false ) );

							foreach ($_terms as $term) : 
							
								$slug = $term->slug;
								$name = $term->name;
								
							?>

								<option value="<?= $slug ?>"><?= $name ?></option>

							<?php endforeach;
						?>
					</select>
					<select class="select" id="model" name="model_options" id="model_options" data-filter="model">
						<option value="all">All Models</option>
						<?php 
							$_terms = get_terms( 'vehicle_model', array( 'hide_empty' => false ) );

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
			<div class="filter-group">
				<label for="make_options">Filter options</label>
				<div class="filter-row">
					<select class="select" name="display_options" id="display" data-filter="display">
						<option value="all">Photos</option>
						<option value="videos">Videos</option>
					</select>
					<select class="select" name="wheel_options" id="wheels" data-filter="wheels">
						<option value="all">All Wheels</option>
						<?php

						$wheel_args = array(
							'post_type' => 'wheel',
							'post_status' =>'publish',
							'posts_per_page' => -1
						);

						$wheel_query = new WP_Query( $wheel_args );

						if ( $wheel_query->have_posts() ) :
							while ( $wheel_query->have_posts() ) : $wheel_query->the_post(); ?>

								<option value="<?= the_title() ?>"><?= the_title() ?></option>

							<?php endwhile;
						endif; wp_reset_postdata();

						?>
					</select>
					<select class="select" name="finish_options" id="finishes" data-filter="finishes">
						<option value="all">All Finishes</option>
						<?php

						$finish_args = array(
							'post_type' => 'finish',
							'post_status' =>'publish',
							'posts_per_page' => -1
						);

						$finish_query = new WP_Query( $finish_args );

						if ( $finish_query->have_posts() ) :
							while ( $finish_query->have_posts() ) : $finish_query->the_post(); ?>

								<option value="<?= the_title() ?>"><?= the_title() ?></option>

							<?php endwhile;
						endif; wp_reset_postdata();

						?>
					</select>
				</div>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>

			<div class="vehicle-grid grid flex justify-start align-center">

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() . '-card' );

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
				<div id="vehicle_load_more" class="load-more">Load More</div>
			</div>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
