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

			<?php 
			
			$diamond_args = [
				'post_type' => 'wheel',
				'posts_per_page' => 6,
				'tax_query' => [
					[
						'taxonomy' => 'wheel_collections',
						'terms' => 'savini-diamond',
						'field' => 'slug',
						'include_children' => false
					]
				]
			];
			$diamond_query = new WP_Query( $diamond_args );

			if ( $diamond_query->have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( $diamond_query->have_posts() ) :
					$diamond_query->the_post();

						get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; wp_reset_postdata(); ?>

		</div>

		<?php

		$vehicle_args = array(
				'post_type' => 'vehicle',
				'tax_query' => array(
					array(
						'taxonomy' => 'wheel_collections',
						'terms' => get_queried_object()->term_id,
						'field' => 'id',
						'operator' => 'IN'
					)
				)
		);

		$vehicle_loop = new WP_Query( $vehicle_args );

		if ( $vehicle_loop->have_posts() ) : ?>

			<div class="vehicles-slider__wrapper">
				<header class="archive-header slider-header text-center"><h2>Vehicles Gallery</h2></header>

				<div class="vehicles-slider">

					<?php while ( $vehicle_loop->have_posts() ) : $vehicle_loop->the_post(); ?>

						<div class="vehicle-slider--item">
							<div class="vehicle-slider--item__image" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>
						</div>

					<?php endwhile; ?>

				</div>
				<a class="see-more" href="/vehicles?collection=<?= get_queried_object()->slug; ?>">See More</a>
			</div>

		<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();