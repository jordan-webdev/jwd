(function($) {

  // Main slider
  if ($('.main-slider').length > 0) {

    var main_slider = new Swiper('.main-slider', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

  }

})(jQuery)
