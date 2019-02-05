<?php

$collection_args = array(
		'taxonomy' => 'wheel_collections',
		'hide_empty' => false,
		'parent' => 0,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'meta_key' => 'order',
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
		$image = get_field( 'collection_image', 'wheel_collections_' . $collection->term_id );

		$id =  strtolower($name);
		//Make alphanumeric (removes all other characters)
		$id = preg_replace("/[^a-z0-9_\s-]/", "", $id);
    //Clean up multiple dashes or whitespaces
    $id = preg_replace("/[\s-]+/", " ", $id);
    //Convert whitespaces and underscore to dash
    $id = preg_replace("/[\s_]/", "-", $id);
		
		if ( $counter %2 === 1 ) : ?>

			<div id="<?= $id ?>" class="collection-item">
				<div class="collection-image column">
				<?= wp_get_attachment_image($image, 'large'); ?>
				</div>
				<div class="collection-content column">
					<h1 class="collection-title text-center"><?= $name ?></h1>
					<p class="collection-description"><?= $description ?></p>
				</div>
			</div>

		<?php else : ?>

		<div id="<?= $id ?>" class="collection-item">
			<div class="collection-content column">
				<h1 class="collection-title text-center"><?= $name ?></h1>
				<p class="collection-description"><?= $description ?></p>
			</div>
			<div class="collection-image column">
			<?= wp_get_attachment_image($image, 'large'); ?>
			</div>
		</div>

		<?php endif ?>

	<?php endforeach ?>

</div>