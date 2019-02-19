<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $images = get_field( 'wheel_gallery' ); 
	
	if( $images ): ?>
    <div class="wheel-gallery row">
        <?php foreach( $images as $image ): ?>
            <div class="gallery-image">
                <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                <p><?php echo $image['caption']; ?></p>
						</div>
        <?php endforeach; ?>
		</div>
	<?php endif; ?>

	<div class="row">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header>
		<div class="sizes">
			<h4>Available Sizes</h4>
			<?php
				// vars	
				$sizes = get_field('available_sizes');

				// check
				if( $sizes ): ?>
				<ul>
					<?php foreach( $sizes as $size ): ?>
						<li><?= $size; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
