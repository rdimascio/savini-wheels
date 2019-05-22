jQuery( function( $ ) {

	let banner;

	$( '.configuration--item' ).on( 'click', '.tooltip', function( e ) {
		e.preventDefault();

		banner = $( e.target ).closest( '.configuration--item' ).find( '.configuration--item__banner' );
		banner.fadeIn();

		banner.on( 'click', 'a[data-target="banner-close"]', function( e ) {
			e.preventDefault();
			banner.fadeOut();
		});
	});
});
