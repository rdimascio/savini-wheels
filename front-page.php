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

    <section id="hero" class="w-100 hero">
        <?php get_template_part( 'template-parts/front', 'hero' ); ?>
    </section>

    <section id="collections" class="w-100 bg-white text-center">
        <?php get_template_part( 'template-parts/front', 'collections' ); ?>
    </section>

    <section id="configurations" class="w-100 bg-gradient">
        <?php get_template_part( 'template-parts/front', 'configurations' ); ?>
    </section>

    <section id="images" class="w-100 img-bg">
        <?php get_template_part( 'template-parts/front', 'images' ); ?>
    </section>

    <section id="videos" class="w-100 bg-white">
        <?php get_template_part( 'template-parts/front', 'videos' ); ?>
    </section>

    <section id="social" class="w-100 img-bg">
        <?php get_template_part( 'template-parts/front', 'social' ); ?>
    </section>

    <section id="customize" class="w-100 bg-white">
        <?php get_template_part( 'template-parts/front', 'customize' ); ?>
    </section>

    <section id="mission" class="w-100 img-bg">
        <?php get_template_part( 'template-parts/front', 'mission' ); ?>
    </section>

</main>

<?php
get_footer();