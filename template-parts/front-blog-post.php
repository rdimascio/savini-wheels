<?php

$args = array(
	'posts_per_page' => 1
);

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post(); ?>

<div class="blog--image m-b-1 text-center">
	<?= get_the_post_thumbnail( $post->id, 'large' ); ?>
</div>
<div class="blog--content">
	<p><?= wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
</div>
<div class="blog--read-more text-center m-t-3">
	<a href="<?= the_permalink(); ?>"><?= get_field( 'homepage_social_blog_button', 'option' ); ?></a>
</div>

<?php endwhile; endif; wp_reset_postdata(); ?>