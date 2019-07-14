jQuery( function( $ ) {

	$( '#wheelGallery' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)'
	});

	$( '#finishGallery' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		selector: '.finish-slider--item__image',
		thumbnail: false
	});

	$( '#finishGrid' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		selector: '.gallery-item',
		thumbnail: true
	});

	// Launch Photo Gallery on button click
	$( '#launchImageGallery' ).on( 'click', function( e ) {
		e.preventDefault();
		$( '.image-gallery--item__1' ).trigger( 'click' );
	});

	$( '#videoGallery' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		selector: '.video',
		youtubePlayerParams: {
			modestbranding: 1,
			showinfo: 0,
			rel: 0,
			controls: 0
		}
	});

	$( '#bmVideo' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		selector: '.bm-video',
		youtubePlayerParams: {
			modestbranding: 1,
			showinfo: 0,
			rel: 0,
			controls: 0
		}
	});

});
