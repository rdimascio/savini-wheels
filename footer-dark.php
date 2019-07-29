<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Starter_Theme
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="dark">

		<div class="footer--wrapper w-100 p-t-5 p-b-3">

			<div class="footer--info text-center">
				<?php
				// check to see if the logo exists and add it to the page
				if ( get_theme_mod( 'light_logo' ) ) : ?>

					<img src="<?= get_theme_mod( 'light_logo' ); ?>" alt="<?= esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />

				<?php // add a fallback if the logo doesn't exist
				else : ?>

						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

				<?php endif; ?>

				<div class="social--row row justify-center align-center p-t-1 p-b-1">
					<a class="social--img" href="https://www.facebook.com/<?= get_field( 'facebook_username', 'option' ); ?>" target="_blank" data-no-instant><img src="https://brandicons.org/light/facebook" width="20" /></a>
					<a class="social--img" href="https://www.twitter.com/<?= get_field( 'twitter_username', 'option' ); ?>" target="_blank" data-no-instant><img src="https://brandicons.org/light/twitter" width="20" /></a>
					<a class="social--img" href="https://www.instagram.com/<?= get_field( 'instagram_username', 'option' ); ?>" target="_blank" data-no-instant><img src="https://brandicons.org/light/instagram" width="20" /></a>
					<a class="social--img" href="https://www.youtube.com/<?= get_field( 'youtube_username', 'option' ); ?>" target="_blank" data-no-instant><img src="https://brandicons.org/light/youtube" width="20" /></a>
				</div>
				
				<p><?= get_field( 'city', 'option' ); ?>, <?= get_field( 'state', 'option' ); ?></p>
				<a href="tel:<?= get_field( 'phone_number', 'option' ); ?>" data-no-instant>tel: <?= get_field( 'phone_number', 'option' ); ?></a>
				<br>
				<a href="mailto:<?= get_field( 'footer_email', 'option' ); ?>" data-no-instant>email: <?= get_field( 'footer_email', 'option' ); ?></a>
			</div>
			<div class="footer--menu">

				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

			</div>

		</div>


		<div class="copyright--wrapper flex justify-center align-center w-100">
			<p><?= get_field( 'footer_copyright', 'option' ); ?></p>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( is_front_page() ) : ?>

	<!-- <div class="loading flex align-center justify-center">
			<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-wheel" style="background: none;">
					<g transform="rotate(314.814 50 50)">
							<ellipse cx="50" cy="50" ng-attr-rx="40" ry="0.1" fill="none" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" transform="rotate(0 50 50)" rx="40" stroke="#e0e0e0" stroke-width="8"></ellipse>
							<ellipse cx="50" cy="50" ng-attr-rx="40" ry="0.1" fill="none" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" transform="rotate(45 50 50)" rx="40" stroke="#e0e0e0" stroke-width="8"></ellipse>
							<ellipse cx="50" cy="50" ng-attr-rx="40" ry="0.1" fill="none" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" transform="rotate(90 50 50)" rx="40" stroke="#e0e0e0" stroke-width="8"></ellipse>
							<ellipse cx="50" cy="50" ng-attr-rx="40" ry="0.1" fill="none" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" transform="rotate(135 50 50)" rx="40" stroke="#e0e0e0" stroke-width="8"></ellipse>
					</g>
					<circle cx="50" cy="50" ng-attr-r="40" fill="none" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" r="40" stroke="#e0e0e0" stroke-width="8"></circle>
					<circle cx="50" cy="50" ng-attr-r="10" ng-attr-fill="#e0e0e0" ng-attr-stroke="#e0e0e0" ng-attr-stroke-width="8" r="10" fill="#e0e0e0" stroke="#e0e0e0" stroke-width="8"></circle>
			</svg>
	</div> -->

<?php endif; ?>

<script src="//instant.page/1.0.0" type="module" integrity="sha384-6w2SekMzCkuMQ9sEbq0cLviD/yR2HfA/+ekmKiBnFlsoSvb/VmQFSi/umVShadQI"></script>

</body>
</html>
