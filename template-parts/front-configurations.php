<div class="configurations--content text-center">
	<h2 class="for__title lined_title title js-appearing-content m-t-5"><span><?= get_field( 'homepage_configurations_title', 'option' ) ?></span></h2>
	<p><?= get_field( 'homepage_configurations_caption', 'option' ) ?></p>
</div>

<?php

$taxonomy = 'wheel_configurations';

$configurations = get_terms( array(
	'taxonomy' => $taxonomy,
	'hide_empty' => false,
	'meta_query' => array(
		array(
			 'key'       => 'wheel_collection',
			 'value'     => 2,
			 'compare'   => '='
		)
	)
)); ?>

<div class="configurations--gallery flex">

	<div class="configurations--main"></div>

	<div class="configurations--options">

		<?php

			$counter = 0;

			foreach ( $configurations as $configuration ) :

				$counter++;

				$id = $configuration->term_id;
				$object = $taxonomy . '_' . $id;
				$title = $configuration->name;
				$slug = $configuration->slug;
				$description = $configuration->description;
				$logo = get_field( 'configuration_logo', $object );
				$image = get_field( 'configuration_image', $object );
				$bg_image = get_field( 'configuration_bg__image', $object );
				$availability = get_field( 'configuration_availability', $object );

		?>

			<div class="configuration--item<?= ($counter === 5) ? " active" : null ?>" data-target="<?= $slug ?>" data-bg="<?= $bg_image ?>">
				<img class="configuration--item__image" src="<?= $image ?>" />
				<h4 class="configuration--item__title"><?= $title ?></h4>
				<div class="configuration--item__content">
					<img class="configuration--item__logo" src="<?= $logo ?>" />
					<p class="configuration--item__description"><?= $description ?></p>
					<p class="configuration--item__availability">
						Available in 
						<?php foreach ($availability as $item) : ?>
								<?= $item ?>
						<?php endforeach; ?>
					</p>
				</div>
			</div>

		<?php endforeach; ?>

	</div>

</div>
