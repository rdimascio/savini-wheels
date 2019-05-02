jQuery( function( $ ) {
	$( '.load-more' ).click( function() {

		let button = $( this ),
			data = {
				'action': 'loadmore',
				'query': loadMoreParams.posts,
				'page': loadMoreParams.current_page
			};

		$.ajax({
			url: loadMoreParams.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function( xhr ) {
				button.text( 'Loading...' );
			},
			success: function( data ) {
				if ( data ) {
					$( '#main' ).find( '.gallery-wrapper:last-of-type' ).after( data );

					loadMoreParams.current_page++;

					if ( loadMoreParams.current_page == loadMoreParams.max_page ) {
						button.remove();
					}

				} else {
					button.remove();
				}
			}
		});
	});
});
