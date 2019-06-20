jQuery( function( $ ) {

	function changeTheMainImage( event ) {
		event.preventDefault();

		let mainImage = $( '.main-image img' ).attr( 'src' ),
			altImage = $( this ).find( 'img' ).attr( 'src' ),
			mainImageFinish = $( '.main-image img' ).attr( 'alt' ),
			altImageFinish = $( this ).find( 'img' ).attr( 'alt' );


		$( '.main-image img' ).attr( 'src', altImage );
		$( this ).find( 'img' ).attr( 'src', mainImage );

		$( '.main-image img' ).attr( 'alt', altImageFinish );
		$( this ).find( 'img' ).attr( 'alt', mainImageFinish );

		$( '.shown-in p' ).text( altImageFinish );
	}

	$( 'body.single' ).on( 'click', '.gallery-image', changeTheMainImage );
});
