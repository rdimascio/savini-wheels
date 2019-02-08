jQuery( function( $ ) {
	$( '#hero-carousel' ).on( 'init', function() {
		$( '.slick-slide .item', this ).each( function() {

			var slideTitle = $( this ).data( 'title' );
			var slideCaption = $( this ).data( 'caption' );

			if ( slideTitle || slideCaption ) {
				$( this ).append( '<div class="slider-caption"><div class="slider-content"><h4>' + slideTitle + '.</h4><p>' + slideCaption + '</p><a>Learn More</a></div></div>' );
			}

		});
	});
});
