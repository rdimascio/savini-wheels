jQuery( function( $ ) {
	$( '#hero-carousel' ).on( 'init', function() {

		// Build the Slider Captions
		$( '.slick-slide .item', this ).each( function() {

			var slideTitle = $( this ).data( 'title' );
			var slideCaption = $( this ).data( 'caption' );
			var slideLink = $( this ).data( 'link' );

			if ( slideTitle || slideCaption ) {
				$( this ).append( '<div class="slider-caption"><div class="slider-content"><h4>' + slideTitle + '.</h4><p>' + slideCaption + '</p><a href="/' + slideLink + '">Learn More</a></div></div>' );
			}

		});

		// Let the loading animation run for 2 seconds
		setTimeout( function() {
			$( '.loading' ).addClass( 'loaded' );
		}, 2000 );

		// Give enough time for the CSS transitions to take place
		setTimeout( function() {
			$( '.loading' ).css( 'display', 'none' );
		}, 6000 );

	});

});
