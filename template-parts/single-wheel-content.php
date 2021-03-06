<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

$wheel_id = get_queried_object_id();
$parent_wheel_id = get_field( 'wheel_parent', $wheel_id );
$wheel_id = ( $parent_wheel_id ) ? $parent_wheel_id : $wheel_id;

$collection = get_the_terms( $post->ID, 'wheel_collections' );
$collection_name = $collection[0]->slug;

$is_this_forged = ( $collection_name == 'savini-forged' ) ? true : false;

if ( $is_this_forged ) {
	$config = get_the_terms( $post->ID, 'wheel_configurations' ); 
	$config_id = $config[0]->term_id;
	$config_logo = get_field( 'configuration_logo', 'wheel_configurations_' . $config_id );
} else {
	$collection_logo = get_field( 'collection_logo', 'wheel_collections_' . $collection[0]->term_id );
}

$new = get_field( 'wheel_new' );
$sizes = get_field( 'available_sizes' );
$widths = get_field( 'wheel_widths' );
$construction = get_field( 'wheel_construction' );

$content = ( ( get_the_content() > '' ) ? get_the_content() : ( ( $is_this_forged ) ? term_description( $config_id ) : term_description( $collection[0]->term_id ) ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="wheel-wrapper">
		<div class="wheel-content flex justify-center align-start">
			<section class="image main-image flex align-center justify-center">
				<img src="<?php the_post_thumbnail_url(); ?>" />
			</section>

			<section class="info flex column align-center justify-between p-r-5">
				<div class="title-row flex align-center justify-between">
					<header class="entry-header">
						<?= ( $new ) ? '<span class="new">NEW</span>' : null ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="configuration-logo">
						<img src="<?= ( $is_this_forged ) ? $config_logo : $collection_logo ?>" alt="">
					</div>
				</div>
				<div class="content">
					<?= $content ?>
				</div>
				<div class="available">
					<p><strong>Available:</strong></p>
					<p><strong>Sizes:</strong>
						<?php
						if ( $sizes ) :

							$count = count( $sizes );

							if ( $sizes ) :
								foreach ( $sizes as $size ) :
									
									if (--$count <= 0) :
										echo $size;
									else :
										echo $size . ', ';
									endif;

								endforeach;
							endif;

						endif;
						?>
					</p>
				<?php if ( $collection_name !== 'black-di-forza' && $collection_name !== 'sv-f' ) : ?>
					<p>
						<strong>Widths:</strong>
						<?= $widths; ?>
					</p>
				<?php endif; ?>
					<p>
						<strong>Construction:</strong>
						<?= $construction; ?>
					</p>
				</div>

				<?php $images = get_field( 'wheel_gallery' ); 
	
				if( $images ): ?>
					<div class="wheel-gallery">
							<?php foreach( $images as $image ): ?>
									<div class="gallery-image">
											<img src="<?= $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
									</div>
							<?php endforeach; ?>
					</div>
				<?php endif;

$finish = get_field( 'wheel_finish' );

if ( $finish ) : ?>

	<div class="shown-in"><strong>SHOWN IN:</strong> <p><?= get_the_title( $finish ) ?></p></div>

<?php endif; ?>

<?php if ( $is_this_forged ) : 
				
				$forged_profile_args = array(
					'post_type' => 'wheel',
					'meta_key' => 'wheel_parent',
					'meta_value' => $wheel_id,
					'meta_compare' => '='
				);

				$forged_profile_loop = new WP_Query( $forged_profile_args );

				if ( $forged_profile_loop->have_posts() ) : 
					$posts = $forged_profile_loop->posts; ?>

				<div class="profiles">
					<p class="title"><strong>Profiles Available:</strong>(Click each profile to see more)</p>

					<div class="profile-row flex justify-start align-center">

					<?php while ( $forged_profile_loop->have_posts() ) :
						$forged_profile_loop->the_post(); ?>

						<?php
						
						$profile_id = $post->ID; 
						$profile_config = get_the_terms( $profile_id, 'wheel_configurations' );
						$profile_config_id = $profile_config[0]->term_id;

						$profile_config_abbrev = get_field( 'configuration_abbreviation', 'wheel_configurations_' . $profile_config_id );


							if ( get_queried_object_id() !== $post->ID ) : ?>

								<a class="profile" href="<?= the_permalink() ?>"><strong><?= $profile_config_abbrev ?></strong> Series</a>

							<?php endif;


					endwhile; ?>

					</div>
				</div>
				
				<?php endif; wp_reset_postdata(); ?>

<?php endif;  ?>

<div class="actions">
	<div class="customize">
		<span>
			<a href="/wheel-builder">Customize this wheel</a>
		</span>
	</div>
	<div class="back">
		<a href="<?= get_term_link( $collection[0]->term_id, 'wheel_collections' ); ?>">Back to wheel collection</a>
	</div>
</div>
			</section>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
