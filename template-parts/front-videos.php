<?php $videos = get_field( 'homepage_videos', 'option', false ); 

// var_export( $videos[0]['field_5d087a69b63c0'] );
?>

<section class="for">
	<h2 data-bottom-top="top: 0;" data-top-bottom="top: 0;" class="for__title lined_title title js-appearing-content">Latest <span>Videos</span></h2>
	<div class="for__container" id="videoGallery">

		<?php 
			$video_count = 1;
			foreach ( $videos as $video ) :

			$video_image = $video['field_5d087f7ae7049'];
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

			<a class="video" href="<?= $video['field_5d087a69b63c0'] ?>" data-src="<?= $video['field_5d087a69b63c0'] ?>"><div style="background-image: url(<?= $video_image[0]; ?>)" data-bottom-top="transform: translateZ(0) translateY(<?= $bottom_top_translate; ?>%); opacity: 0;" data-top-bottom="transform: translateZ(0) translateY(<?= $top_bottom_translate; ?>%);" data--100-bottom="opacity:1;" class="for__item for__item--<?= $video_count; ?> greyscale js-appearing-content"></div></a>

		<?php
			$video_count++;
			endforeach; ?>
		<div class="for__item for__item--9"></div>
		<div class="for__overlay"></div>
	</div>

	<div class="video-gallery--view_more text-center m-t-3 m-b-3">
		<a href="https://youtube.com/user/SaviniWheels" id="launchVideoGallery">More Videos</a>
	</div>
</section>