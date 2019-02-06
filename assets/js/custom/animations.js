jQuery(function($) {

	// START OF: is mobile =====
	function isMobile() {
		return (/Android|iPhone|iPad|iPod|BlackBerry/i).test(navigator.userAgent || navigator.vendor || window.opera);
	}
	// ===== END OF: is mobile


	// START OF: mark is mobile =====
	(function() {
		if(isMobile()){
			$('body').addClass('body--mobile');
		}else{
			$('body').addClass('body--desktop');
		}
	})();
	// ===== END OF: mark is mobile


	// START OF: content appearing =====
var contentAppearing = (function(){
	var bind = function () {
		var $content= $('.js-appearing-content');
		$content.appear();

		var setOffset = function () {
			var coefficient = -0.7; //manual
			var offsetValue = $content.eq(0).innerHeight();

			$content.attr('data-appear-top-offset', offsetValue * coefficient);
		};
		setOffset();

		$(document.body)
			.on('appear', '.js-appearing-content', function(e, $affected) {
				// this code is executed for each appeared element
				$(this).addClass('skrollable-between');
			})
			.on('disappear', '.js-appearing-content', function(e, $affected) {
				// this code is executed for each appeared element
				$(this).removeClass('skrollable-between');
			});
	};
	return {
		bind: bind
	}
}());

contentAppearing.bind();
// ===== END OF: content appearing

	// START OF: on scroll section =====
	var onScroll = (function(){
		var bind = function() {
			var scrollr = skrollr.init({
				'smoothScrolling': true,
				'smoothScrollingDuration': 2000,
				'easing': 'linear',
				'forceHeight': false
			});
		};
		return {
			bind: bind
		}
	}());
	if(!isMobile()){
		//Skrollr imitates scroll on mobile devices and it performs awfully. That is why we turned off the skrollr plugin on mobiles and created another set of animations: special for mobile devices.
		window.onload = function() {
			onScroll.bind();
		};
	}
// ===== END OF: on scroll section

});

