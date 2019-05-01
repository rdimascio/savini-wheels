jQuery( function( $ ) {

	let url = new URL( window.location.href ),
		params = new URLSearchParams( url.search.slice( 1 ) );

	function setQueryVars() {

		let key = $( this ).data( 'filter' ),
			value = this.value;

		if ( 'all' === value && params.has( key ) ) {
			url.searchParams.delete( key );
		} else {
			url.searchParams.set( key, value );
		}

		window.location.href = url;

	}

	function updateSelectValues() {

		params.forEach( function( value, key ) {

			const filter = $( 'select#' + key );

			filter.val( value );

		});

	}

	$( 'select' ).on( 'change', setQueryVars );

	updateSelectValues();

});
