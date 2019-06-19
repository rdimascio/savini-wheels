<h2 data-bottom-top="top: 0;" data-top-bottom="top: 0;" class="for__title lined_title title"><span><?= get_field( 'homepage_vehicle_gallery_title', 'option' ); ?></span></h2>
<p><?= get_field( 'homepage_vehicle_gallery_caption', 'option' ); ?></p>

<?php $vehicle_gallery_args = array(
	'post_type' => 'vehicle',
	'post_status' => 'publish',
	'posts_per_page' => 6
);

$vehicle_gallery_query = new WP_Query( $vehicle_gallery_args );

if ( $vehicle_gallery_query->have_posts() ) : ?>

<div class="vehicle-grid grid flex justify-start align-center">

	<?php
	/* Start the Loop */
	while ( $vehicle_gallery_query->have_posts() ) :
		$vehicle_gallery_query->the_post();

		/*
		* Include the Post-Type-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Type name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', 'vehicle-front' );

	endwhile;

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</div>

<div class="see-more-wrapper">
	<a href="/vehicles" class="see-more"><?= get_field( 'homepage_vehicle_gallery_button', 'option' ); ?></a>
</div>