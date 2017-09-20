(function($) {
  //Close button
  closeBtn();
  
  // Not Clickable
  $('.not-clickable').on('click', function() {
    return false;
  });

  //Responsive BG images
  responsiveBG();
  
  function closeBtn() {
    $('.close-btn').on('click', function() {
      var target = $(this).attr('data-closes');
      $(target).fadeTo(0, 1000, function() {
        $(this).remove();
      });
    });
    $('.css-close-btn').on('click', function() {
      var target = $(this).attr('data-closes');
      $(target).removeClass('active');
    });
  }

  function responsiveBG() {
    $('.js-responsive-bg').each(function() {
      var that = $(this);
      var mq = window.matchMedia('(min-width: 1190px)');
      if (mq.matches) {
        //Preload
        $('<img/>').attr('src', $(this).attr('data-lg-bg')).on('load',
          function() {
            $(this).remove(); // prevent memory leaks as @benweet suggested
            that.css('background-image', 'url(' + that.attr(
              'data-lg-bg') + ')');
            requestAnimationFrame(function() {
              setTimeout(function() {
                that.addClass('active');
                that.find('.loader').addClass('active');
              }, 200); //Edit this value depending on the image

            });
          });
      } else {
        //Preload
        $('<img/>').attr('src', $(this).attr('data-lg-bg')).on('load',
          function() {
            $(this).remove(); // prevent memory leaks as @benweet suggested
            that.css('background-image', 'url(' + that.attr(
              'data-sm-bg') + ')');
            requestAnimationFrame(function() {
              setTimeout(function() {
                that.addClass('active');
                that.find('.loader').addClass('active');
              }, 400); //Edit this value depending on the image
            });
          });
      }
    });
  }

})(jQuery)
