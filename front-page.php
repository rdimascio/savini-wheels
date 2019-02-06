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

    <section id="testimonials">
        <img class="lambo js-appearing-content" src="http://savini.local/app/uploads/2019/02/lambo.png" alt="" data-bottom-top="transform: translateX(-35%) translateY(0%); opacity: .7;" data-top-bottom="transform: translateX(35%) translateY(-35%);" data--100-bottom="opacity:1;">

        <!-- <body>
  <div class='frame'>
    <header>
      <div class='sticker s1'>May</div>
      <div class='state'>California</div>
      <div class='sticker s2'>2016</div>
    </header>
    <div class='number'>h82jd29</div>
  </div>
</body> -->

    </section>

</main>

<?php
get_footer();