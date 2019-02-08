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
  $('#main-menu').click(function (e) {
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
  $('#hero-carousel').on('init', function () {
    $('.slick-slide .item', this).each(function () {
      var slideTitle = $(this).data('title');
      var slideCaption = $(this).data('caption');

      if (slideTitle || slideCaption) {
        $(this).append('<div class="slider-caption"><div class="slider-content"><h4>' + slideTitle + '.</h4><p>' + slideCaption + '</p><a>Learn More</a></div></div>');
      }
    });
  });
});
"use strict";
"use strict";

jQuery(function ($) {
  $('#wheelGallery').lightGallery({
    mode: 'lg-fade',
    cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)'
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

  slick.on('beforeChange', function () {
    startProgressbar();
  });
  slick.on('swipe', function () {
    startProgressbar();
    isPause = true;
  });
  startProgressbar();
});
"use strict";

jQuery(function ($) {
  $('.tilt').tilt({
    glare: true,
    maxGlare: .15,
    scale: 1.05,
    perspective: 100,
    maxTilt: 5
  });
  $('.wheel-tilt').tilt({
    glare: true,
    maxGlare: .5,
    scale: 1.05,
    perspective: 100,
    maxTilt: 5
  });
  $('.transparent-tilt').tilt({
    glare: true,
    maxGlare: .15,
    scale: 1.05,
    perspective: 100,
    maxTilt: 5
  });
});