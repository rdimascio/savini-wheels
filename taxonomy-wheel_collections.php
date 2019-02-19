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

			<h2><?= single_term_title(); ?></h2>
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

		<header class="archive-header text-center">

			<h2><?= single_term_title(); ?> | <span>Configurations</span></h2>
			<p><?= get_field( 'collection_description', 'wheel_collections_14' ); ?></p>

		</header>

		<div class="configurations grid flex justify-center align-center">

			<?php

			$configurations = get_terms( array(
				'taxonomy' => 'wheel_configurations',
				'hide_empty' => false,
				'meta_query' => array(
					array(
						'key'       => 'wheel_collection',
						'value'     => 14,
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

				<div class="configuration--item" data-target="">
					<img class="configuration--item__image" src="<?= $image ?>" />
					<h4 class="configuration--item__title"><?= $title ?></h4>
				</div>

			<?php endforeach; ?>

		</div>

		<div class="info row justify-between">
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
		</div>

		<header class="archive-header slider-header text-center"><h2><span>Step Lip</span> Vehicles Gallery</h2></header>

		<div class="vehicles-slider">
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-1.png)"></div>
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-2.png)"></div>
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-3.png)"></div>
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-1.png)"></div>
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-2.png)"></div>
			<div class="vehicle-slider--item" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__vehicle_slider-image-3.png)"></div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();