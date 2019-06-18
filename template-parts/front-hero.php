<div class="carousel-wrapper" id="hero-carousel">
		<div class="carousel-inner">
				<?php while ( has_sub_field( 'homepage_slider', 'option' ) ) : ?>
				
					<div class="item" style="background-image: url(<?= the_sub_field( 'homepage_slider_background' ); ?>)" data-title="<?= the_sub_field( 'homepage_slider_title' ); ?>" data-caption="<?= the_sub_field( 'homepage_slider_caption' ); ?>" data-link="<?= get_permalink( the_sub_field( 'homepage_slider_link' ) ); ?>"></div>

				<?php endwhile; ?>
		</div>
</div>