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
					get_template_part( 'template-parts/content', 'sv-f-wheels' );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; wp_reset_postdata(); ?>

		</div>

		<header class="info--header">

			<div class="row">
				<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__sv-f-mft-copy.png" alt="">
				<h4>Mono Form Technology</h4>
			</div>

			<p>Flow Form technology is a process that applies pressure to the inner wheel after casting, stretching and forming the material, causing the aluminum to flow while imparting tensile strength – similar to how forged wheels are made. Thanks to this state-of-the-art technology, the result is greater strength and shock-resistance over conventional cast wheels, which translates to overall better vehicle performance.</p>

		</header>

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
			<div class="row align-center">
				<div class="column justify-center">
					<h1>Precision Engineered</h1>
					<p>Stronger, lighter wheels for optimal performance and looks!</p>

					<hr>

					<h2>Lightweight & Track Ready</h2>
					<p>Performance proven</p>

					<h2><span>Two-Piece Center Cap Detail</span></h2>
					<p>Another level of customization</p>

					<h2>Mono Form Technology</h2>
					<p>Precision engineered</p>

					<img src="https://saviniwheels.dimascio.design/wp-content/uploads/2019/02/savini__sv-f-info_image.png" alt="">
				</div>
				<div class="column"></div>
			</div>
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
				<header class="archive-header slider-header text-center">
					<h2><span>SV-F</span> Vehicles</h2>
				</header>

				<div class="vehicles-slider">
				
					<?php while ( $vehicle_loop->have_posts() ) : $vehicle_loop->the_post(); ?>

						<div class="vehicle-slider--item" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>

					<?php endwhile; ?>

				</div>
				<a class="see-more" href="/vehicles?collection=<?= get_queried_object()->slug; ?>">See More</a>
			</div>

		<?php endif; wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();