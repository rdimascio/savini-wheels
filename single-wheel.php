<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Starter_Theme
 */

$wheel_id = get_queried_object_id();
$parent_wheel_id = get_field( 'wheel_parent', $wheel_id );
$wheel_id = ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id;

get_header( 'wheel' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/single', 'wheel-content' );
endwhile;
?>

<?php
$vehicle_args = array(
	'post_type' => 'vehicle',
	// 'meta_key' => 'vehicle_wheel',
	// 'meta_value_num' => ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id,
	// 'meta_compare' => 'CONTAINS'
	'meta_query' => array(
		array(
			'key' => 'vehicle_wheel',
			'value' => $wheel_id,
			'compare' => 'LIKE'
		)
	)
);
$vehicles = new WP_Query( $vehicle_args );

// foreach ( $vehicles as $vehicle ) :
// 	$vehicle_wheel = get_field( 'vehicle_wheel', $vehicle->ID );

	if ( $vehicles->have_posts() ) :  ?>

			<div class="vehicles-slider__wrapper">

				<header class="single-header slider-header text-center">
					<h2><span><?= get_the_title( $wheel_id ) ?></span> Vehicles Gallery</h2>
				</header>

				<div class="vehicles-slider">
	
		<?php while ( $vehicles->have_posts() ) : 
			$vehicles->the_post(); ?>
	
					<a class="vehicle-slider--item" href="<?= the_permalink(); ?>">
						<div class="vehicle-slider--item__image" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>
					</a>

		<?php endwhile; ?>

				</div>

				<a class="see-more" href="/vehicles?wheels=<?= get_the_title( $wheel_id ); ?>">See More</a>

			</div>

		<?php endif; wp_reset_postdata(); ?>

<?php
$finish_args = array(
	'post_type' => 'finish',
	'meta_query' => array(
		array(
			'key' => 'finish_wheel',
			'value' => $wheel_id,
			'compare' => 'LIKE'
		)
	)
);
$finishes = new WP_Query( $finish_args );

	if ( $finishes->have_posts() ) : ?>

			<div class="finish-slider__wrapper">

				<header class="single-header slider-header text-center">
					<h2><span><?= get_the_title( $wheel_id ); ?></span> Custom Finish Gallery</h2>
				</header>
				
				<div class="finish-slider" id="finishGallery">

		<?php while ( $finishes->have_posts() ) : 
			$finishes->the_post()?>

						<a class="finish-slider--item" href="<?= get_the_post_thumbnail_url(); ?>">
							<div class="finish-slider--item__image" data-src="<?= get_the_post_thumbnail_url(); ?>" style="background-image:url(<?= get_the_post_thumbnail_url(); ?>)"></div>
						</a>

		<?php endwhile; ?>

				</div>

				<a class="see-more" href="/finishes?wheels=<?= get_the_title( $wheel_id ); ?>">See More</a>

			</div>

			<?php endif; wp_reset_postdata(); ?>

		</main>
	</div>

<?php
get_footer();
