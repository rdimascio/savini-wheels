<h2 data-bottom-top="top: 0;" data-top-bottom="top: 0;" class="for__title lined_title title"><span><?= get_field( 'homepage_collections_section_title', 'option' ); ?></span></h2>
<p><?= get_field( 'homepage_collections_section_caption', 'option' ); ?></p>

<?php get_template_part( 'template-parts/front', 'collections-loop' ); ?>
