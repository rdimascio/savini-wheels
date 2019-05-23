"use strict";

jQuery(function ($) {
  // START OF: is mobile =====
  function isMobile() {
    return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || window.opera);
  } // ===== END OF: is mobile
  // START OF: mark is mobile =====


  (function () {
    if (isMobile()) {
      $('body').addClass('body--mobile');
    } else {
      $('body').addClass('body--desktop');
    }
  })(); // ===== END OF: mark is mobile
  // START OF: content appearing =====


  var contentAppearing = function () {
    var bind = function bind() {
      var $content = $('.js-appearing-content');
      $content.appear();

      var setOffset = function setOffset() {
        var coefficient = -0.7; //manual

        var offsetValue = $content.eq(0).innerHeight();
        $content.attr('data-appear-top-offset', offsetValue * coefficient);
      };

      setOffset();
      $(document.body).on('appear', '.js-appearing-content', function (e, $affected) {
        // this code is executed for each appeared element
        $(this).addClass('skrollable-between');
      }).on('disappear', '.js-appearing-content', function (e, $affected) {
        // this code is executed for each appeared element
        $(this).removeClass('skrollable-between');
      });
    };

    return {
      bind: bind
    };
  }();

  contentAppearing.bind(); // ===== END OF: content appearing
  // START OF: on scroll section =====

  var onScroll = function () {
    var bind = function bind() {
      var scrollr = skrollr.init({
        'smoothScrolling': true,
        'smoothScrollingDuration': 2000,
        'easing': 'linear',
        'forceHeight': false
      });
    };

    return {
      bind: bind
    };
  }();

  if (!isMobile()) {
    //Skrollr imitates scroll on mobile devices and it performs awfully. That is why we turned off the skrollr plugin on mobiles and created another set of animations: special for mobile devices.
    window.onload = function () {
      onScroll.bind();
    };
  } // ===== END OF: on scroll section

});
"use strict";

jQuery(function ($) {
  $('body.archive .image-slider').slick({
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
  $('body.archive .vehicles-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    infinite: true,
    arrows: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
  $('body.single-wheel .vehicles-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    arrows: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
  $('body.single-wheel .finish-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    arrows: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  }); // $( 'body.archive.term-sv-f .sv-f-slider' ).slick({
  // 	slidesToShow: 1,
  // 	slidesToScroll: 1,
  // 	infinite: true,
  // 	arrows: true
  // });
});
"use strict";

jQuery(function ($) {
  var mainContainer = $('.configurations--main');
  var optionsContainer = $('.configurations--options');
  var configurationOption = $('.configurations--options .configuration--item');
  var activeItem = $('.configuration--item.active');
  var activeBGImage = $(activeItem).attr('data-bg');
  activeItem.appendTo(mainContainer);
  mainContainer.css('background-image', 'url(' + activeBGImage + ')');
  configurationOption.on('click', function (e) {
    e.preventDefault();
    var index = $(this).index();
    var currentActiveItem = mainContainer.find('.active');
    currentActiveItem.removeClass('active').detach();

    if (0 === index) {
      optionsContainer.prepend(currentActiveItem);
    } else {
      $('.configurations--options .configuration--item:nth-child(' + index + ')').after(currentActiveItem);
    }

    $(this).addClass('active').detach().appendTo(mainContainer);
    mainContainer.addClass('change');
    setTimeout(function () {
      mainContainer.removeClass('change');
    }, 2000);
  });
  $('.configurations--main').on('click', '.configuration--item.active', function (e) {
    e.preventDefault();
    window.location.href = '/wheel-collections/savini-forged?configuration=' + $(this).attr('data-target');
  });
});
"use strict";

jQuery(function ($) {
  var url = new URL(window.location.href),
      params = new URLSearchParams(url.search.slice(1));

  function setQueryVars() {
    var key = $(this).data('filter'),
        value = this.value;

    if ('all' === value && params.has(key)) {
      url.searchParams.delete(key);
    } else {
      url.searchParams.set(key, value);
    }

    window.location.href = url;
  }

  function updateSelectValues() {
    params.forEach(function (value, key) {
      var filter = $('select#' + key);
      filter.val(value);
    });
  }

  $('select').on('change', setQueryVars);
  updateSelectValues();
});
"use strict";

jQuery(function ($) {
  // Hide Header on on scroll down
  var prev = 0;
  var delta = 5;
  var $window = $(window);
  var nav = $('.site-header');
  var navbarHeight = 65;
  $window.on('scroll', function () {
    var st = $(this).scrollTop();

    if (Math.abs(prev - st) <= delta) {
      return;
    } else {
      $('.slider-progress').hide();
    }

    if (st > navbarHeight) {
      var scrollTop = $window.scrollTop();
      nav.toggleClass('nav-up', scrollTop > prev);
      prev = scrollTop;
    }

    if (0 === $window.scrollTop()) {
      nav.removeClass('nav-up');
      $('.slider-progress').show();
    }
  });
  var siteNav = $('#site-navigation-wrapper');
  $('#mobile-menu').click(function (e) {
    e.preventDefault();
    siteNav.fadeIn();
  });
  siteNav.find('a[data-target="site-nav-close"]').click(function (e) {
    e.preventDefault();
    siteNav.fadeOut();
  });
});
"use strict";

jQuery(function ($) {
  // const body = $( 'body' );
  // const loader = function() {
  // 	// Let the loading animation run for 2 seconds
  // 	setTimeout( function() {
  // 		$( '.loading' ).addClass( 'loaded' );
  // 		body.removeClass( 'is--loading' );
  // 	}, 2000 );
  // 	// Give enough time for the CSS transitions to take place
  // 	setTimeout( function() {
  // 		$( '.loading' ).css( 'display', 'none' );
  // 	}, 6000 );
  // };
  // if ( body.hasClass( 'home' ) ) {
  // 	body.addClass( 'is--loading' );
  // }
  $('#hero-carousel').on('init', function () {
    // Build the Slider Captions
    $('.slick-slide .item', this).each(function () {
      var slideTitle = $(this).data('title');
      var slideCaption = $(this).data('caption');
      var slideLink = $(this).data('link');

      if (slideTitle || slideCaption) {
        $(this).append('<div class="slider-caption"><div class="slider-content"><h4>' + slideTitle + '.</h4><p>' + slideCaption + '</p><a href="/' + slideLink + '">Learn More</a></div></div>');
      }
    }); // loader();
  });
});
"use strict";

jQuery(function ($) {
  $('.entry-title a').lettering();
  $('.entry-header h1').lettering();
});
"use strict";

jQuery(function ($) {
  $('#wheelGallery').lightGallery({
    mode: 'lg-fade',
    cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)'
  }); // Launch Photo Gallery on button click

  $('#launchImageGallery').on('click', function (e) {
    e.preventDefault();
    $('.image-gallery--item__1').trigger('click');
  });
  $('#videoGallery').lightGallery({
    mode: 'lg-fade',
    cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
    selector: '.video',
    youtubePlayerParams: {
      modestbranding: 1,
      showinfo: 0,
      rel: 0,
      controls: 0
    }
  });
  $('#bmVideo').lightGallery({
    mode: 'lg-fade',
    cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
    selector: '.bm-video',
    youtubePlayerParams: {
      modestbranding: 1,
      showinfo: 0,
      rel: 0,
      controls: 0
    }
  });
});
"use strict";
"use strict";

jQuery(function ($) {
  var banner;
  $('.configuration--item').on('click', '.tooltip', function (e) {
    e.preventDefault();
    banner = $(e.target).closest('.configuration--item').find('.configuration--item__banner');
    banner.css('display', 'flex');
    banner.on('click', 'a[data-target="banner-close"]', function (e) {
      e.preventDefault();
      banner.fadeOut();
    });
  });
});
"use strict";

jQuery(function ($) {
  var time = 2;
  var $bar,
      slick = $('.carousel-inner'),
      // slickDots = $( '.slick-dots li button' ),
  isPause,
      tick,
      percentTime;

  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 10);
  }

  function interval() {
    if (false === isPause) {
      percentTime += .3 / (time + 0.1);
      $bar.css({
        width: percentTime + '%'
      });

      if (100 <= percentTime) {
        slick.slick('slickNext');
        startProgressbar();
      }
    }
  }

  function resetProgressbar() {
    $bar.css({
      width: 0 + '%'
    });
    clearTimeout(tick);
  }

  if ($('body').hasClass('home')) {
    slick.slick({
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
    $bar = $('.slider-progress .progress');
    $('.carousel-wrapper').on({
      mouseenter: function mouseenter() {
        isPause = true;
      },
      mouseover: function mouseover() {
        isPause = true;
      },
      mouseleave: function mouseleave() {
        isPause = false;
      }
    });
    slick.on('beforeChange', function () {
      startProgressbar();
    });
    slick.on('swipe', function () {
      startProgressbar();
      isPause = true;
    });
    startProgressbar();
  }
});
// jQuery( function( $ ) {
// 	$( '.tilt' ).tilt({
// 		glare: true,
// 		maxGlare: .15,
// 		scale: 1.05,
// 		perspective: 100,
// 		maxTilt: 5
// 	});
// 	$( '.wheel-tilt' ).tilt({
// 		glare: true,
// 		maxGlare: .5,
// 		scale: 1.05,
// 		perspective: 100,
// 		maxTilt: 5
// 	});
// 	$( '.transparent-tilt' ).tilt({
// 		glare: true,
// 		maxGlare: .15,
// 		scale: 1.05,
// 		perspective: 100,
// 		maxTilt: 5
// 	});
// });
"use strict";