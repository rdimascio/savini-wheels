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

	<footer id="footer">

		<div class="footer--wrapper w-100 p-t-5 p-b-3">

			<div class="footer--info text-center">
				<img src="http://savini.local/app/uploads/2019/02/savini__white-logo.png" alt="">

				<div class="social--row row justify-center align-center p-t-1 p-b-1">
					<a class="social--img" href="https://www.facebook.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/facebook" width="20" /></a>
					<a class="social--img" href="https://www.twitter.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/twitter" width="20" /></a>
					<a class="social--img" href="https://www.instagram.com/saviniwheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/instagram" width="20" /></a>
					<a class="social--img" href="https://www.youtube.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/youtube" width="20" /></a>
				</div>
				
				<p>Anaheim, California</p>
				<a href="tel:866-779-4646" data-no-instant>tel: 866.779.4646</a>
				<br>
				<a href="mailto:info@saviniwheels.com" data-no-instant>email: info@<span>savini</span>wheels.com</a>
			</div>
			<div class="footer--menu">

				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

			</div>

		</div>


		<div class="copyright--wrapper flex justify-center align-center w-100">
			<p>Copyright &copy; 2018 Savini Wheels All Rights Reserved</p>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php if ( is_front_page() ) : ?>

	<div class="loading flex align-center justify-center">
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
	</div>

<?php endif; ?>

<!-- instant.page preloads links on hover -->
<script src="//instant.page/1.0.0" type="module" integrity="sha384-6w2SekMzCkuMQ9sEbq0cLviD/yR2HfA/+ekmKiBnFlsoSvb/VmQFSi/umVShadQI"></script>

</body>
</html>
