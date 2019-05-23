<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

$collection = get_the_terms( get_the_ID(), 'wheel_collections' );
$collection_name = $collection[0]->slug;

$is_this_forged = ( $collection_name == 'savini-forged' ) ? true : false;

if ( $is_this_forged ) {
	$config = get_the_terms( get_the_ID(), 'wheel_configurations' ); 
	$config_id = $config[0]->term_id;
	$config_logo = get_field( 'configuration_logo', 'wheel_configurations_' . $config_id );
} else {
	$collection_logo = get_field( 'collection_logo', 'wheel_collections_' . $collection[0]->term_id );
}

$new = get_field( 'wheel_new' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $is_this_forged ) : ?>
		<div class="config-logo">
			<img src="<?= $config_logo ?>" alt="" width="50">
		</div>
	<?php endif; ?>

	<a href="<?= the_permalink(); ?>">
		<?php the_post_thumbnail( 'full' ); ?>
	</a>

	<?php if ( $is_this_forged && $new ) : ?>
		<div class="new">NEW</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
