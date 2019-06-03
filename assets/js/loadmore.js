jQuery( function( $ ) {
	$( '.load-more' ).click( function() {

		let button = $( this ),
			action = button.attr( 'id' ),
			data = {
				'action': action,
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

					button.text( 'Load More' );

					if ( 'blog_load_more' === action ) {
						$( '#main' ).find( '.article-wrapper:last-of-type' ).after( data );
					} else {
						$( '#main' ).find( '.gallery-wrapper:last-of-type' ).after( data );
					}


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
