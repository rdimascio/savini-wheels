<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

$config = get_the_terms( $post->ID, 'wheel_configurations' ); 
$config_id = $config[0]->term_id;
$config_logo = get_field( 'configuration_logo', 'wheel_configurations_' . $config_id );

$new = get_field( 'wheel_new' );
$sizes = get_field( 'available_sizes' );
$widths = get_field( 'wheel_widths' );
$construction = get_field( 'wheel_construction' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="wheel-wrapper">
		<div class="wheel-content flex justify-center align-center">
			<section class="image flex align-center justify-center">
				<?php wp_starter_theme_post_thumbnail(); ?>
			</section>

			<section class="info flex column align-center justify-between p-r-5">
				<div class="title-row flex align-center justify-between">
					<header class="entry-header">
<?= ( $new ) ? '<span class="new">NEW</span>' : null ?>
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<div class="configuration-logo">
						<img src="<?= $config_logo; ?>" alt="">
					</div>
				</div>
				<div class="content">
					<p><?= the_content(); ?></p>
				</div>
				<div class="available">
					<p><strong>Available:</strong></p>
					<p><strong>Sizes:</strong>
<?php

$count = count( $sizes );

if ( $sizes ) :
	foreach ( $sizes as $size ) :
		
		if (--$count <= 0) :
			echo $size . '"';
		else :
			echo $size . '", ';
		endif;

	endforeach;
endif;

?>
					</p>
					<p>
						<strong>Widths:</strong>
<?= $widths; ?>
					</p>
					<p>
						<strong>Construction:</strong>
<?= $construction; ?>
					</p>
				</div>
			</section>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
