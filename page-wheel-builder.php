<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Starter_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div id="builder_wrapper"></div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

<!--- Script must be called after jQuery on your website --->
<script src="//www.iconfigurators.com/wb/v3/wb-loader.cfm?id=9"></script>
<script>
	if (jQuery("#builder_wrapper")[0])
			jQuery( ".entry-cont" ).css("display","block")
</script>