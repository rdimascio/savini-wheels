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

			<h2><span>SV-F</span> Wheels</h2>
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

		<div class="info row justify-between">
				<div class="info-column text-center p-l-1 p-r-1">
				<div class="image" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__info-step_1.png)"></div>
					<h2>Step 1</h2>
					<p>The process starts using a casting specially made for Flow Forming Technology that’s placed onto a steel rim that’s then prepped for molding.</p>
				</div>
				<div class="info-column text-center p-l-1 p-r-1">
					<div class="image" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__info-step_2.png)"></div>
					<h2>Step 2</h2>
					<p>Extensive heat and pressure is applied using three individual rollers to shape the aluminum to the wheel mold.</p>
				</div>
				<div class="info-column text-center p-l-1 p-r-1">
				<div class="image" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__info-step_3.png)"></div>
					<h2>Step 3</h2>
					<p>The individually shaped rollers fortify the barrel to the specified width and density, allowing for a stronger wheel using less material.</p>
				</div>
				<div class="info-column text-center p-l-1 p-r-1">
				<div class="image" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__info-step_4.png)"></div>
					<h2>Step 4</h2>
					<p>The molecular compound of the aluminum significantly hardens in a streamline direction, resulting in a tolerant and considerably lighter wheel.</p>
				</div>
		</div>

		<div class="image-cover" style="background-image:url(https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__sv-f-info_bg.png)">
	
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