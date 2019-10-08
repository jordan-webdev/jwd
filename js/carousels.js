(function($) {

  // Main slider
  if ($('.main-slider').length > 0) {

    var main_slider = new Swiper('.main-slider', {
      loop: true,
      effect: 'fade',
      speed: 500,
      keyboard: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    main_slider.on("slideChangeTransitionStart", function() {
      var slider = $(".main-slider");
      toggle_videos(slider);
    });

  }



  function toggle_videos(slider) {

    var active_slide = slider.find('.swiper-slide-active');
    var all_videos = slider.find("video");
    var active_video = active_slide.find("video");

    if (all_videos.length > 0) {
      all_videos[0].pause();
      all_videos[0].currentTime = 0;
    }

    if (active_video.length > 0) {
      active_video[0].play();
    }

  }

})(jQuery)
