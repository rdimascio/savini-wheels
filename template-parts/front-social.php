<div class="social--wrapper row">
	<div class="social--column feed--column column">
		<div class="social--title m-b-3 text-center">
			<h4>Social <span>Feed</span></h4>
		</div>

		<div class="social--content social-feed">
			<div class="social--content__gallery">
				<div class="social--content__gallery-item">
					<img src="http://savini.local/app/uploads/2019/02/savini__social-feed-huracan.png" alt="">
				</div>
				<div class="social--content__gallery-item">
					<img src="http://savini.local/app/uploads/2019/02/savini__social-feed-karma.png" alt="">
				</div>
				<div class="social--content__gallery-item">
					<img src="http://savini.local/app/uploads/2019/02/savini__social-feed-ferrari.png" alt="">
				</div>
				<div class="social--content__gallery-item">
					<img src="http://savini.local/app/uploads/2019/02/savini__social-feed-aventador.png" alt="">
				</div>
			</div>
		</div>

		<div class="social--view_more text-center m-t-3">
			<a href="https://www.instagram.com/saviniwheels/">See More</a>
		</div>
	</div>
	<div class="social--column blog--column column">
		<div class="social--title m-b-3 text-center">
			<h4>Blog</h4>
		</div>

		<div class="social--content blog">
			<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/front', 'blog-post' ); ?>
			<?php endwhile; else :
				get_template_part( 'template-parts/front', 'no-posts' );
			endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>