<?php $videos = get_field( 'homepage_videos', 'option', false ); ?>

<section class="for" style="background-color: <?= get_field( 'homepage_video_section_background-color', 'option' ); ?>">
	<h2 data-bottom-top="top: 0;" data-top-bottom="top: 0;" class="for__title lined_title title js-appearing-content"><span><?= get_field( 'homepage_video_section_title', 'option' ); ?></span></h2>
	<p><?= get_field( 'homepage_video_section_caption', 'option' ); ?></p>

	<div class="for__container" id="videoGallery">

		<?php 
			$video_count = 1;
			foreach ( $videos as $video ) :

			$video_image = $video['field_5d088aca7882b'];
			$video_image = wp_get_attachment_image_src( $video_image, 'full' );

			switch ( $video_count ) :
				case 1:
				case 3:
					$bottom_top_translate = '0';
					$top_bottom_translate = '-35';
					break;
				case 2:
					$bottom_top_translate = '-30';
					$top_bottom_translate = '-0';
					break;
				case 4:
				case 6:
					$bottom_top_translate = '5';
					$top_bottom_translate = '-35';
					break;
				case 5:
					$bottom_top_translate = '-25';
					$top_bottom_translate = '5';
					break;
				case 7:
					$bottom_top_translate = '10';
					$top_bottom_translate = '-35';
					break;
				case 8:
					$bottom_top_translate = '-20';
					$top_bottom_translate = '10';
					break;
			endswitch;
			?>

			<a class="video" href="<?= $video['field_5d08709b7882a'] ?>" data-src="<?= $video['field_5d08709b7882a'] ?>"><div style="background-image: url(<?= $video_image[0]; ?>)" data-bottom-top="transform: translateZ(0) translateY(<?= $bottom_top_translate; ?>%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(<?= $top_bottom_translate; ?>%);" data--100-bottom="opacity:1;" class="for__item for__item--<?= $video_count; ?> js-appearing-content"></div></a>

		<?php
			$video_count++;
			endforeach; ?>
		<div class="for__item for__item--9"></div>
		<div class="for__overlay"></div>
	</div>

	<div class="video-gallery--view_more text-center m-t-3 m-b-3">
		<a href="https://youtube.com/user/SaviniWheels" id="launchVideoGallery"><?= get_field( 'homepage_video_section_background_button', 'option' ); ?></a>
	</div>
</section>