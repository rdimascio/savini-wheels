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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'dark' ); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding flex align-center justify-between m-l-4 m-r-4">
				<div class="siteLogo">
					<?php
					//if ( is_archive() || is_page('blog') || ( is_page() && has_custom_logo() ) ) :

						the_custom_logo();

					//else : 
						//if ( is_archive() || is_single() && get_theme_mod( 'light_logo' ) ) : ?>

							<!-- <a href="<?//= home_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
									<img width="225" height="38" src="<?//= get_theme_mod( 'light_logo' ); ?>" class="custom-logo" alt="<?//php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="logo" />
							</a> -->

						<?//php // add a fallback if the logo doesn't exist
						//else : ?>

							<!-- <h1 class="site-title"><?//php bloginfo( 'name' ); ?></h1> -->

						<?//php endif;
					//endif; ?>
				</div>

				<div class="siteNavigation">
					<a id="main-menu" class="box-shadow-menu" href="#" data-no-instant></a>
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

	<div id="content" class="site-content">
