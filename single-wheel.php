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

			<div class="vehicles-slider__wrapper">
				<header class="single-header slider-header text-center">
					<h2><span><?= get_the_title( $wheel_id ) ?></span> Vehicles Gallery</h2>
				</header>

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
			'value_num' => $wheel_id,
			'compare' => 'IN'
		)
	)
);
$vehicles = new WP_Query( $vehicle_args );

// foreach ( $vehicles as $vehicle ) :
// 	$vehicle_wheel = get_field( 'vehicle_wheel', $vehicle->ID );

	if ( $vehicles->have_posts() ) : 
	
		while ( $vehicles->have_posts() ) : 
			$vehicles->the_post(); ?>
	
					<div class="vehicle-slider--item">
						<div class="vehicle-slider--item__image" style="background-image:url(<?= get_the_post_thumbnail_url( $vehicle->ID ); ?>)"></div>
					</div>

		<?php endwhile; endif;  wp_reset_postdata(); ?>

				</div>
				<a class="see-more" href="/vehicles?wheels=<?= get_the_title( $wheel_id ); ?>">See More</a>
			</div>

			<div class="finish-slider__wrapper">
					<header class="single-header slider-header text-center">
						<h2><span><?= get_the_title( $parent_wheel_id ) ?></span> Custom Finish Gallery</h2>
					</header>
					
					<div class="finish-slider">

<?php
$finish_args = array(
	'post_type' => 'finish',
	'meta_query' => array(
		array(
			'key' => 'finish_wheel',
			'value_num' => $wheel_id,
			'compare' => 'IN'
		)
	)
);
$finishes = get_posts( $finish_args );

foreach ( $finishes as $finish ) :
	$finish_wheel = get_field( 'finish_wheel', $finish->ID );

	if ( $finish_wheel && $finish_wheel == $wheel_id ) : ?>

						<div class="finish-slider--item">
							<div class="finish-slider--item__image" style="background-image:url(<?= get_the_post_thumbnail_url( $finish->ID ); ?>)"></div>
						</div>

	<?php endif;
endforeach; wp_reset_postdata(); ?>

					</div>
					<a class="see-more" href="/finishes?wheels=<?= get_the_title( $wheel_id ); ?>">See More</a>
				</div>

		</main>
	</div>

<?php
get_footer();
