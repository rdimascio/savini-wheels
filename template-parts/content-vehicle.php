<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

    <div class="gallery-content">
        <div class="gallery-grid">
            <?php
            $gallery_images = get_field( 'vehicle_gallery' );

            if ( $gallery_images ) :

                foreach ( $gallery_images as $image ) : ?>

                    <div class="gallery-image-wrapper">
                        <img src="<?= $image['sizes']['large']; ?>" alt="<?= $image['alt']; ?>">
                    </div>

                <?php endforeach;

            endif;
            ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
