<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

get_header();

$id = get_queried_object()->term_id;
$class = get_queried_object()->slug . '_grid';

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<header class="archive-header text-center">

			<img src="<?= get_field( 'collection_logo', 'wheel_collections_' . $id ); ?>" />
			<p><?= get_field( 'collection_description', 'wheel_collections_' . $id ); ?></p>

		</header>

		<div class="<?= $class ?> grid flex justify-center align-center">

			<?php if ( have_posts() ) : ?>

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

			endif; wp_reset_postdata(); ?>

		</div>

		<?php

		$vehicle_args = array(
				'post_type' => 'vehicle',
				// 'meta_key' => 'wheel_collection',
				// 'meta_compare' => '=',
				// 'meta_value_num' => $vehicle_id
				'tax_query' => array(
					array(
						'taxonomy' => 'wheel_collections',
						'terms' => $id,
					)
				)
		);

		$vehicle_loop = new WP_Query( $vehicle_args );

		if ( $vehicle_loop->have_posts() ) : ?>

			<header class="archive-header slider-header text-center"><h2>Vehicles Gallery</h2></header>

			<div class="vehicles-slider">

				<?php while ( $vehicle_loop->have_posts() ) : $vehicle_loop->the_post(); ?>

					<div class="vehicle-slider--item" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>

				<?php endwhile; ?>

			</div>

		<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();