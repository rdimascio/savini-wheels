jQuery( function( $ ) {
	$( '#wheelGallery' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)'
	});

	$( '#videoGallery' ).lightGallery({
		mode: 'lg-fade',
		cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		youtubePlayerParams: {
			modestbranding: 1,
			showinfo: 0,
			rel: 0,
			controls: 0
		}
	});
});
