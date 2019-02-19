<?php

$collection_args = array(
		'taxonomy' => 'wheel_collections',
		'hide_empty' => false,
		'parent' => 0,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_key' => 'collection_order',
		'meta_compare' => 'NUMERIC'
); 

$collection_query = new WP_Term_Query( $collection_args ) ?>

<div class="collection-container">

	<?php
	
	$counter = 0;

	foreach ( $collection_query->get_terms() as $collection ) :

		$counter +=1;

		$name = $collection->name;
		$description = $collection->description;
		$link = get_term_link( $collection );
		$image = get_field( 'collection_image', 'wheel_collections_' . $collection->term_id );

		$id =  strtolower($name);
		//Make alphanumeric (removes all other characters)
		$id = preg_replace("/[^a-z0-9_\s-]/", "", $id);
    //Clean up multiple dashes or whitespaces
    $id = preg_replace("/[\s-]+/", " ", $id);
    //Convert whitespaces and underscore to dash
    $id = preg_replace("/[\s_]/", "-", $id);
		
		if ( $counter %2 === 1 ) : ?>

			<div id="<?= $id ?>" data-bottom-top="transform: translateZ(0) translateY(0%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(-35%);" data--100-bottom="opacity:1;" class="collection-item collection-item__<?= $counter ?> js-appearing-content">
				<div data-tilt class="collection-image wheel-tilt column">
					<a href="<?= $link ?>" class="collection-link">
						<?= wp_get_attachment_image($image, 'large'); ?>
					</a>
				</div>
				<div class="collection-content column" data-bottom-top="transform: translateZ(0) translateY(0%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(-35%);" data--100-bottom="opacity:1;">
					<a href="<?= $link ?>" class="collection-link">
						<h1 class="collection-title text-center"><?= $name ?></h1>
					</a>
					<p class="collection-description"><?= $description ?></p>
				</div>
			</div>

		<?php else : ?>

			<div id="<?= $id ?>" data-bottom-top="transform: translateZ(0) translateY(0%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(-35%);" data--100-bottom="opacity:1;" class="collection-item collection-item__ js-appearing-content">
				<div class="collection-content column" data-bottom-top="transform: translateZ(0) translateY(0%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(-35%);" data--100-bottom="opacity:1;">
					<a href="<?= $link ?>" class="collection-link">
						<h1 class="collection-title text-center"><?= $name ?></h1>
					</a>
					<p class="collection-description"><?= $description ?></p>
				</div>
				<div data-tilt class="collection-image wheel-tilt column">
					<a href="<?= $link ?>" class="collection-link">
						<?= wp_get_attachment_image($image, 'large'); ?>
					</a>
				</div>
			</div>

		<?php endif ?>

	<?php endforeach ?>

</div>