jQuery( function( $ ) {

  var time = 2;
  var $bar,
      $slick,
      $slickDots,
      isPause,
      tick,
      percentTime;

  $slick = $( '.carousel-inner' );
  $slickDots = $( '.slick-dots li button' );
  $slick.slick({
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

  $bar = $( '.slider-progress .progress' );
  
  $( '.carousel-wrapper' ).on({
    mouseenter: function() {
      isPause = true;
    },
    mouseover: function() {
      isPause = true;
    },
    mouseleave: function() {
      isPause = false;
    }
  });
  
  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval( interval, 10 );
  }
  
  function interval() {
    if( isPause === false ) {
      percentTime += .3 / ( time + 0.1 );
      $bar.css({
        width: percentTime+'%'
      });
      if( percentTime >= 100 )
        {
          $slick.slick( 'slickNext' );
          startProgressbar();
        }
    }
  }
  
  
  function resetProgressbar() {
    $bar.css({
     width: 0+'%'
    });
    clearTimeout( tick );
  }

  $slick.on( 'beforeChange', function() {
    startProgressbar();
  });

  $slick.on( 'swipe', function() {
    startProgressbar();
    isPause = true;
  });
  
  startProgressbar();
});
