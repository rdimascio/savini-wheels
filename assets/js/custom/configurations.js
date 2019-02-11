jQuery( function( $ ) {

	const mainContainer = $( '.configurations--main' );
	const optionsContainer = $( '.configurations--options' );
	const configurationOption = $( '.configurations--options .configuration--item' );
	let activeItem = $( '.configuration--item.active' );
	const activeBGImage = $( activeItem ).attr( 'data-bg' );

	activeItem.appendTo( mainContainer );
	mainContainer.css( 'background-image', 'url(' + activeBGImage + ')' );

	configurationOption.on( 'click', function( e ) {
		e.preventDefault();

		let index = $( this ).index();
		let currentActiveItem = mainContainer.find( '.active' );

		currentActiveItem
			.removeClass( 'active' )
			.detach();

		if ( 0 === index ) {
			optionsContainer.prepend( currentActiveItem );
		} else {
			$( '.configurations--options .configuration--item:nth-child(' + ( index ) + ')' ).after( currentActiveItem );
		}

		$( this )
			.addClass( 'active' )
			.detach()
			.appendTo( mainContainer );

		mainContainer
			.addClass( 'change' );

		setTimeout( function() {
			mainContainer
				.removeClass( 'change' );
		}, 2000 );

	});

	$( '.configurations--main .configuration--item.active' ).on( 'click', function( e ) {
		e.preventDefault();

		window.location.href = '/wheel-collections/savini-forged?' + $( this ).attr( 'data-target' );

	});

});
