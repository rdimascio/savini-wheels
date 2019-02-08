jQuery( function( $ ) {
	$( '#hero-carousel .slick-slide .item' ).each( function() {

		console.log('fuck');

		var slideTitle = $( this ).data( 'title' );
		var slideCaption = $( this ).data( 'caption' );

		if ( slideTitle || slideCaption ) {
			$( this ).append( '<div class="slider-caption"><div class="slider-content"><h4>' + slideTitle + '.</h4><p>' + slideCaption + '</p><a>Learn More</a></div></div>' );
		}

	});
});
