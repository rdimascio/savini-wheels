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

		<div class="configurations grid flex justify-center align-center">

			<?php

			$configurations = get_terms( array(
				'taxonomy' => 'wheel_configurations',
				'hide_empty' => false,
				'meta_query' => array(
					array(
						'key'       => 'wheel_collection',
						'value'     => get_queried_object()->term_id,
						'compare'   => '='
					)
				)
			));

			foreach ( $configurations as $configuration ) :

				$config_id = $configuration->term_id;
				$object = $taxonomy . '_' . $config_id;
				$title = $configuration->name;
				$abbreviation = get_field( 'configuration_abbreviation', $object );
				$image = get_field( 'configuration_image', $object );
				$banner = get_field( 'configuration_banner', $object );

			?>

				<div class="configuration--item">
					<a class="tooltip open-popup-link" href="#" data-no-instant>?</a>
					<a class="configuration--item__link" href="<?= home_url() . '/wheel-collections/savini-forged?config=' . $configuration->slug ?>">
						<img class="configuration--item__image" src="<?= $image ?>" />
						<h4 class="configuration--item__title"><?= $abbreviation ?></h4>
					</a>
					<div class="configuration--item__banner" style="display:none;">
						<a class="close" href="#" data-target="banner-close" data-no-instant>x Close</a>
						<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/05/SAVINI-site-PERFORMANCE-config-banner-1.jpg" alt="">
					</div>
				</div>

			<?php endforeach; ?>
		</div>

		<?php if ( isset( $_GET['config'] ) ) : 
		
		$this_config = get_term_by( 'slug', $_GET['config'], 'wheel_configurations' );
		$this_config_description = $this_config->description;
		
		?>

		<header class="archive-header text-center">
			<h2><?= single_term_title(); ?> | <span><?= $this_config->name ?></span></h2>
			<p><?= $this_config_description ?></p>
		</header>

		<?php else : ?>

		<header class="archive-header text-center">
			<h2><?= single_term_title(); ?></h2>
			<p><?= get_field( 'collection_description', 'wheel_collections_' . $id ); ?></p>
		</header>

		<?php endif; ?>

		<div class="<?= $class ?> grid flex justify-center align-center">

			<?php

			if ( isset( $_GET['config'] ) ) {
				$forged_args = array(
					'post_type' => 'wheel',
					'posts_per_page' => 10,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'wheel_collections',
							'terms' => 'savini-forged',
							'field' => 'slug',
							'operator' => 'IN'
						),
						array(
							'taxonomy' => 'wheel_configurations',
							'terms' => $_GET['config'],
							'field' => 'slug',
							'operator' => 'IN'
						)
					)
				);
			}

			else {
				$forged_args = array(
					'post_type' => 'wheel',
					'meta_key' => 'wheel_parent',
					'meta_value' => false,
					'meta_compare' => '=',
					'posts_per_page' => 10,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'wheel_collections',
							'terms' => 'savini-forged',
							'field' => 'slug',
							'operator' => 'IN'
						)
					)
				);
			}

			$forged_loop = new WP_Query( $forged_args );
			
			if ( $forged_loop->have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( $forged_loop->have_posts() ) :
					$forged_loop->the_post();

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

		<!-- <div class="info row justify-between">
				<div class="info-column row p-l-1 p-r-1">
					<div class="info-inner-column">
						<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/steplip.png" alt="">
						<p>The SL (Step Lip Concave) configuration utilizes a center disk that is 1" smaller in diameter to reduce weight, 
							unsprung mass, and improve return on inertia. The configuration also features a unique concave spoke profile and a signature undercut for improved aerodynamics.</p>
					</div>
					<div class="info-inner-column">
						<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-half-wheel.png" alt="">
					</div>
				</div>
				<div class="info-column p-l-1 p-r-1">
					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-1.png" alt="">
				</div>
				<div class="info-column p-l-1 p-r-1">
					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-2.png" alt="">
				</div>
		</div>

		<div class="image-slider">
			<div class="image-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-image.png)"></div>
			<div class="image-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-image.png)"></div>
			<div class="image-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-image.png)"></div>
			<div class="image-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__wheel_collections-wheel-image.png)"></div>
		</div> -->

		<?php

		$forged_vehicle_args = array(
			'post_type' => 'vehicle',
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'wheel_collections',
					'terms' => get_queried_object()->term_id,
					'field' => 'id',
					'operator' => 'IN'
				)
			)
		);

		$forged_vehicle_query = new WP_Query( $forged_vehicle_args );

		if ( $forged_vehicle_query->have_posts() ) : ?>
			<div class="vehicles-slider__wrapper">
				<header class="archive-header slider-header text-center"><h2><span><?= ( isset( $_GET['config'] ) ) ? ucwords( str_replace( "-", " ", $_GET['config'] ) ) : 'Savini Forged' ?></span> Vehicles Gallery</h2></header>

				<div class="vehicles-slider">
					<?php while ( $forged_vehicle_query->have_posts() ) : $forged_vehicle_query->the_post();

					$configurations = get_field( 'vehicle_configuration' );

					if ( isset( $_GET['config'] ) ) :

						$config_object = get_term_by( 'slug', $_GET['config'], 'wheel_configurations', 'OBJECT' );
						$config_id = $config_object->term_id;

						if ( $configurations && in_array( $config_id, $configurations ) ) : ?>

								<div class="vehicle-slider--item" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>

						<?php endif;
					
					else : ?>
							
							<div class="vehicle-slider--item" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>

					<?php endif;
						
					endwhile; ?>
				</div>
				<a class="see-more" href="/vehicles?collection=<?= get_queried_object()->slug; ?>">See More</a>
			</div>

		<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();