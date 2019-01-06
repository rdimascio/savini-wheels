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

<div id="lightgallery">
  <a href="https://picsum.photos/200/300?image=11">
      <img src="https://picsum.photos/200/300?image=11" />
  </a>
  <a href="https://picsum.photos/200/300?image=12">
      <img src="https://picsum.photos/200/300?image=12" />
  </a>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $("#lightgallery").lightGallery({
            mode: 'lg-fade',
            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)'
        }); 
    });
</script>

<?php
get_footer();