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

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

<?php
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/single', 'wheel-content' );
endwhile;
?>

			<div class="vehicles-slider__wrapper">
				<header class="single-header slider-header text-center"><h2><?= get_the_title( $wheel_id ) ?> Vehicles Gallery</h2></header>
				<div class="vehicles-slider">

<?php
$vehicle_args = array(
	'post_type' => 'vehicle',
	// 'meta_key' => 'vehicle_wheel',
	// 'meta_value_num' => ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id,
	// 'meta_compare' => 'CONTAINS'
	'meta_query' => array(
		array(
			'key' => 'vehicle_wheel',
			'value_num' => ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id,
			'compare' => 'IN'
		)
	)
);
$vehicles = get_posts( $vehicle_args );

foreach ( $vehicles as $vehicle ) :
	$vehicle_wheels = get_field( 'vehicle_wheel', $vehicle->ID );

	if ( in_array( $wheel_id, $vehicle_wheels ) ) : ?>

					<div class="vehicle-slider--item" style="background-image:url(<?= get_the_post_thumbnail_url( $vehicle->ID ); ?>)"></div>

	<?php endif;
endforeach; ?>

				</div>
				<a class="see-more" href="">See More</a>
			</div>

<?php
$finish_args = array(
	'post_type' => 'finish',
	'meta_query' => array(
		array(
			'key' => 'finish_wheel',
			'value_num' => ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id,
			'compare' => 'IN'
		)
	)
);
$finish_query = new WP_Query( $finish_args );

if ( $finish_query->have_posts() ) : ?>

				<div class="finish-slider__wrapper">
					<header class="single-header slider-header text-center"><h2><?= get_the_title( $parent_wheel_id ) ?> Custom Finish Gallery</h2></header>
					<div class="finish-slider">

						<?php while ( $finish_query->have_posts() ) : $finish_query->the_post(); ?>
							<div class="finish-slider--item" style="background-image:url(<?= the_post_thumbnail_url(); ?>)"></div>
						<?php endwhile; ?>
					</div>
					<a class="see-more" href="">See More</a>
				</div>

<?php endif; ?>

		</main>
	</div>

<?php
get_footer();
