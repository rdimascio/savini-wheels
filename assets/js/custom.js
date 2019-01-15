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
    arrows: true,
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
  $('#hero-carousel .slick-slide .item').each(function () {
    var slideTitle = $(this).data('title');
    var slideCaption = $(this).data('caption');

    if (slideTitle || slideCaption) {
      $(this).append('<div class="slidecaption"><h4>' + slideTitle + '</h4><p>' + slideCaption + '</p></div>');
    }
  });
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
    }

    if (st > navbarHeight) {
      var scrollTop = $window.scrollTop();
      nav.toggleClass('nav-up', scrollTop > prev);
      prev = scrollTop;
    }

    if (0 === $window.scrollTop()) {
      nav.removeClass('nav-up');
    }
  });
});