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

<main>
    <section id="hero" class="hero">
        <?php get_template_part( 'template-parts/front', 'hero-carousel' ); ?>
    </section>

    <section id="wheelCollections" class="wheel-collections">
        <?php get_template_part( 'template-parts/front', 'wheel-collections' ); ?>
    </section>

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
    </div> -->

</main>

<?php
get_footer();