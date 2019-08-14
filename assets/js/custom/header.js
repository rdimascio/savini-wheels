jQuery( function( $ ) {

	// Hide Header on on scroll down
	let prev = 0;
	const delta = 5;
	const $window = $( window );
	const nav = $( '.site-header' );
	const navbarHeight = 65;

	$window.on( 'scroll', function() {

		let st = $( this ).scrollTop();

		if ( Math.abs( prev - st ) <= delta ) {
			return;
		} else {
			$( '.slider-progress' ).hide();
		}

		if ( st > navbarHeight ) {
			const scrollTop = $window.scrollTop();
			nav.toggleClass( 'nav-up', scrollTop > prev );
			prev = scrollTop;
		}

		if ( 0 === $window.scrollTop() ) {
			nav.removeClass( 'nav-up' );
			$( '.slider-progress' ).show();
		}

	});

	const siteNav = $( '#site-navigation-wrapper' );

	$( '#mobile-menu' ).click( function( e ) {
		e.preventDefault();
		siteNav.fadeIn();
	});

	siteNav.find( 'a[data-target="site-nav-close"]' ).click( function( e ) {
		e.preventDefault();
		siteNav.fadeOut();
	});

	const tuvPopup = $( '#tuv-popup-container' );

	$( '.open-popup-link.tuv' ).click( function( e ) {
		e.preventDefault();
		tuvPopup.fadeIn();
	});

	tuvPopup.find( 'a[data-target="tuv-popup-close"]' ).click( function( e ) {
		e.preventDefault();
		tuvPopup.fadeOut();
	});

});
