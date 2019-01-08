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

<div class="carousel-wrapper" id="hero-carousel">
    <div class="carousel-inner">
        <div class="item">
            <img src="https://picsum.photos/1600/800?image=1069" />
        </div>
        <div class="item">
            <img src="https://picsum.photos/1600/800?image=1074" />
        </div>
        <div class="item">
            <img src="https://picsum.photos/1600/800?image=1012" />
        </div>
        <div class="item">
            <img src="https://picsum.photos/1600/800?image=1001" />
        </div>
    </div>

    <div class="slider-progress">
        <div class="progress"></div>
    </div>
</div>

<!-- <div id="lightgallery">
  <li data-src="https://picsum.photos/200/300?image=11">
    <a>
        <img src="https://picsum.photos/200/300?image=11" />
    </a>
  </li>
  <li data-src="https://picsum.photos/200/300?image=12">
    <a>
        <img src="https://picsum.photos/200/300?image=12" />
    </a>
  </li>
</div>

<script type="text/javascript">
    jQuery(function($) {
        $("#lightgallery").lightGallery({
            mode: 'lg-fade',
            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
        });
    });
</script> -->

<?php
get_footer();