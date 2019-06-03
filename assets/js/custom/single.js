jQuery( function( $ ) {

	function changeTheMainImage( event ) {
		event.preventDefault();

		let mainImage = $( '.main-image img' ).attr( 'src' ),
			altImage = $( this ).find( 'img' ).attr( 'src' );


		$( '.main-image img' ).attr( 'src', altImage );
		$( this ).find( 'img' ).attr( 'src', mainImage );
	}

	$( 'body.single' ).on( 'click', '.gallery-image', changeTheMainImage );
});
