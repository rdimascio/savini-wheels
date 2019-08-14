<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Starter_Theme
 */

$object_id = get_queried_object_id();
$collection = get_the_terms( $object_id, 'wheel_collections' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/wlf5qml.css">
	<link rel="stylesheet" href="https://use.typekit.net/lyo4rqi.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $collection[0]->slug ); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding flex align-center justify-between m-l-4 m-r-4">
				<div class="siteLogo">
					<?php if ( is_page() && has_custom_logo() ) : the_custom_logo();
							else : 
								if ( is_archive() || is_single() && get_theme_mod( 'light_logo' ) ) : ?>

                    <a href="<?= home_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
                        <img width="225" height="38" src="<?= get_theme_mod( 'light_logo' ); ?>" class="custom-logo" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="logo" />
                    </a>

                <?php // add a fallback if the logo doesn't exist
                else : ?>

										<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

						<?php endif; endif; ?>
				</div>

				<div class="siteNavigation">
					<div class="header-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
					</div>
					<a href="#" id="tuv-popup" class="open-popup-link tuv light">
						<img src="<?= home_url(); ?>/wp-content/uploads/2019/08/tuv.jpg" alt="Tuv">
					</a>
					<a href="#" id="tuv-popup" class="open-popup-link tuv dark">
						<img src="<?= home_url(); ?>/wp-content/uploads/2019/08/tuv-dark.jpg" alt="Tuv">
					</a>
					<a id="mobile-menu" class="box-shadow-menu" href="#" data-no-instant></a>
				</div>
		</div><!-- .site-branding -->
		<div class="slider-progress">
				<div class="progress"></div>
		</div>
	</header><!-- #masthead -->

	<div id="site-navigation-wrapper" class="flex justify-center align-center" style="display:none">
		<a class="close white text uppercase" data-target="site-nav-close" href="#" data-no-instant>&times; Close</a>
		<nav id="site-navigation" class="main-navigation flex align-center justify-center">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->

		<div class="social--row row justify-center align-center p-t-1 p-b-1">
			<a class="social--img" href="https://www.facebook.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/facebook" width="20" /></a>
			<a class="social--img" href="https://www.twitter.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/twitter" width="20" /></a>
			<a class="social--img" href="https://www.instagram.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/instagram" width="20" /></a>
			<a class="social--img" href="https://www.youtube.com/SaviniWheels" target="_blank" data-no-instant><img src="https://brandicons.org/light/youtube" width="20" /></a>
		</div>
	</div>

	<div id="tuv-popup-container" class="flex justify-center align-center" style="display:none">
		<div class="tuv-popup-wrapper">
			<a class="close white text uppercase" data-target="tuv-popup-close" href="#" data-no-instant>&times;</a>
			<div class="tuv-popup-content">
				<div class="tuv-popup-image">
					<img src="http://savininew.wpengine.com/wp-content/uploads/2019/07/tuv-color.jpg" alt="">
				</div>
				<div class="tuv-popup-text">
					<h1>What is TUV Verification?</h1>
					<p>TUV® Verified Quality Management System is a prestigious engineering status in the aftermarket wheel industry. Each set of Savini Wheels meets this quality verification.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="content" class="site-content">
