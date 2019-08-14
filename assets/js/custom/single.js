jQuery( function( $ ) {

	function changeTheMainImage( event ) {
		event.preventDefault();

		let altImage = $( this ).find( 'img' ).attr( 'src' ),
			altImageFinish = $( this ).find( 'img' ).attr( 'alt' );


		$( '.main-image img' ).attr( 'src', altImage );

		$( '.main-image img' ).attr( 'alt', altImageFinish );

		$( '.shown-in p' ).text( altImageFinish );
	}

	$( 'body.single' ).on( 'click', '.gallery-image', changeTheMainImage );
});
