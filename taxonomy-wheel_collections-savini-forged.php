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

$this_config = ( isset( $_GET['config'] ) ) ? get_term_by( 'slug', $_GET['config'], 'wheel_configurations' ) : get_term_by( 'slug', 'step-lip-concave', 'wheel_configurations' );
$this_config_description = $this_config->description;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<header class="archive-header text-center">
			<h2><?= single_term_title(); ?></h2>
			<p><?= get_queried_object()->description; ?></p>
		</header>

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

				endwhile; ?>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; wp_reset_postdata(); ?>

		</div>

		<div id="see-more">
			<a class="see-more" href="/wheels?collection=<?= get_queried_object()->slug; ?>">View All</a>
		</div>

		<header class="archive-header text-center">
			<h2><?= single_term_title(); ?> | <span>Configurations</h2>
			<p><?= $this_config_description ?></p>
		</header>

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
				$image = get_field( 'configuration_image', $object );
			?>

				<div class="configuration--item<?= ( $this_config->term_id == $config_id ) ? ' active' : null ?>">
					<a class="configuration--item__link" href="<?= home_url() . '/wheel-collections/savini-forged?config=' . $configuration->slug ?>">
						<img class="configuration--item__image" src="<?= $image ?>" />
						<h4 class="configuration--item__title"><?= $title ?></h4>
					</a>
				</div>

			<?php endforeach; ?>
		</div>

		<div class="image-slider">
			<div class="image-slider--item" style="background-image:url(<?= get_field( 'configuration_banner', $this_config ); ?>)"></div>

			<?php foreach ( $configurations as $configuration ) : 
				$config_id = $configuration->term_id;
				$object = 'wheel_configurations_' . $config_id;
				$banner = get_field( 'configuration_banner', $object );

				if ( $this_config->term_id != $config_id ) : ?>
					<div class="image-slider--item" style="background-image:url(<?= $banner; ?>)"></div>
				<?php endif;
			endforeach; ?>
		</div>

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

							<div class="vehicle-slider--item">	
								<div class="vehicle-slider--item__image" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>
							</div>

						<?php endif;
					
					else : ?>
							
							<div class="vehicle-slider--item">
								<div class="vehicle-slider--item__image" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>
							</div>

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