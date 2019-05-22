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

			<img src="<?= get_field( 'collection_logo', 'wheel_collections_' . get_queried_object()->term_id ); ?>" />
			<?= get_field( 'collection_description', 'wheel_collections_' . get_queried_object()->term_id ); ?>

		</header>

		<div class="<?= $class ?> grid flex justify-center align-center">

			<?php

				$forza_args = [
					'post_type' => 'wheel',
					'posts_per_page' => 5,
					'tax_query' => [
						[
							'taxonomy' => 'wheel_collections',
							'terms' => 'black-di-forza',
							'field' => 'slug',
							'include_children' => false
						]
					]
				];
				$forza_query = new WP_Query( $forza_args );
			
				if ( $forza_query->have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( $forza_query->have_posts() ) :
					$forza_query->the_post();

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

		<div class="bm-concave flex align-center justify-center">
			<header class="concave-header text-center">
					<h2><span>BM</span>Concave</h2>
					<p>Profile</p>
			</header>

			<div class="concave-items flex align-center justify-center">
				<div class="concave-item">
					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/05/bm-concave-front-1.png" alt="">
					<div class="caption">
						<h4>Front</h4>
						<p>Profile</p>
					</div>
				</div>

				<div class="concave-item">
					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/05/bm-concave-rear-1.png" alt="">
					<div class="caption">
						<h4>Rear Concave</h4>
						<p>Profile</p>
					</div>
				</div>

				<div class="concave-item">
					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/05/bm-concave-rear_super-1.png" alt="">
					<div class="caption">
						<h4>Rear<span>Super</span>Concave</h4>
						<p>Profile</p>
					</div>
				</div>
			</div>

		</div>

		<?php

		$vehicle_args = array(
				'post_type' => 'vehicle',
				'post_status' => 'publish',
				'posts_per_page' => 5,
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
				<header class="archive-header slider-header text-center"><h2><span>BM Forged</span> Vehicles Gallery</h2></header>

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

		<div id="bmVideo">
			<a class="bm-video" href="https://www.youtube.com/watch?v=jGzD-r6dQeg" data-src="https://www.youtube.com/watch?v=jGzD-r6dQeg">
				<div style="background-image: url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__latest-videos-sv-wheels.png)" class=""></div>
			</a>
		</div>

		<header class="archive-header bm-forged-header text-center">
			<img src="<?= get_field( 'collection_logo', 'wheel_collections_' . get_queried_object()->term_id ); ?>" />
			<h2><span>Forged</span> Series</h2>
		</header>

		<div class="<?= $class ?> grid flex justify-center align-center">

			<?php
				$forza_forged_args = [
					'post_type' => 'wheel',
					'post_status' => 'publish',
					'posts_per_page' => 6,
					'tax_query' => [
						[
							'taxonomy' => 'wheel_collections',
							'terms' => 'black-di-forza-forged',
							'field' => 'slug'
						]
					]
				];
				$forza_forged_query = new WP_Query( $forza_forged_args );

				if ( $forza_forged_query->have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( $forza_forged_query->have_posts() ) :
					$forza_forged_query->the_post();

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
		$forged_vehicle_args = array(
			'post_type' => 'vehicle',
			'post_status' => 'publish',
			'posts_per_page' => 5,
			'tax_query' => array(
				array(
					'taxonomy' => 'wheel_collections',
					'terms' => 'black-di-forza-forged',
					'field' => 'slug',
					'operator' => 'IN'
				)
			)
		);

		$forged_vehicle_loop = new WP_Query( $forged_vehicle_args );

		if ( $forged_vehicle_loop->have_posts() ) : ?>

			<div class="vehicles-slider__wrapper">
				<header class="archive-header slider-header text-center"><h2><span>BM</span> Vehicles Gallery</h2></header>

				<div class="vehicles-slider">

					<?php while ( $forged_vehicle_loop->have_posts() ) : $forged_vehicle_loop->the_post(); ?>

						<div class="vehicle-slider--item">
							<div class="vehicle-slider--item__image" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>
						</div>

					<?php endwhile; ?>

				</div>
				<a class="see-more" href="/vehicles?collection=black-di-forza-forged">See More</a>
			</div>

		<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();