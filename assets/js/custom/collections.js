jQuery( function( $ ) {

	$( 'body.archive .image-slider' ).slick({
		draggable: true,
		adaptiveHeight: false,
		dots: true,
		arrows: false,
		mobileFirst: true,
		pauseOnDotsHover: true,
		infinite: true,
		speed: 1000,
		fade: true,
		cssEase: 'linear'
	});

	$( 'body.archive .vehicles-slider' ).slick({
		slidesToShow: 3,
		slidesToScroll: 3,
		infinite: true,
		arrows: true
	});

	$( 'body.archive.term-sv-f .sv-f-slider' ).slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		arrows: true
	});

});
