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

    <section id="collections" class="w-100 text-center" style="background: <?= get_field( 'homepage_wheel_collections_background_color', 'option' ); ?>">
        <?php get_template_part( 'template-parts/front', 'collections' ); ?>
    </section>

    <section id="configurations" class="w-100 bg-gradient" style="background: linear-gradient(to left top, <?= get_field( 'homepage_configurations_background_color_1', 'option' ); ?> 0, <?= ( $color_2 = get_field( 'homepage_configurations_background_color_2', 'option' ) ) ? $color_2 : $color_1; ?> 50%, <?= get_field( 'homepage_configurations_background_color_1', 'option' ); ?> 100%)">
        <?php get_template_part( 'template-parts/front', 'configurations' ); ?>
    </section>

    <section id="gallery" class="w-100" style="background: <?= get_field( 'homepage_vehicle_galley_background_color', 'option' ); ?>">
        <?php get_template_part( 'template-parts/front', 'gallery' ); ?>
    </section>

    <section id="videos" class="w-100 bg-white">
        <?php get_template_part( 'template-parts/front', 'videos' ); ?>
    </section>

    <section id="social" class="w-100" style="background-image: url(<?= get_field( 'homepage_social_background', 'option' ); ?>)">
        <?php get_template_part( 'template-parts/front', 'social' ); ?>
    </section>

    <section id="customize" class="w-100">
        <?php get_template_part( 'template-parts/front', 'customize' ); ?>
    </section>

    <section id="mission" class="w-100" style="background-image: url(<?= get_field( 'homepage_mission_section_background', 'option' ); ?>)">
        <?php get_template_part( 'template-parts/front', 'mission' ); ?>
    </section>

</main>

<?php
get_footer();