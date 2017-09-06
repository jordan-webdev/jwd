(function($) {
  //Close button
  closeBtn();

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

  // Drop Down
  doDDL($('.drop-down__btn'), 'fadeInUp', 'fadeOutDown');

  function doDDL(btn) {
    // Click animation
    btn.on('click forceclick', function(e) {
      var list = $(this).next('.drop-down__list');
      dropDownListToggle(list);

      // Rotate the arrow
      var caret = $(this).find('.drop-down__caret');
      caret.toggleClass('active');

    }); // Button click

    // Match Widths
    $('.drop-down__list').each(function() {
      var btn = $(this).prev('.drop-down__btn');
      $(this).width(btn.outerWidth(true) - 2); //Account for 2px border
    });

    // Close drop down list on clicking a filter, and on mobile
    $('.drop-down--filters__link').on('click', function(){
      var list = $(this).closest('.drop-down__list');
      var mq = window.matchMedia( "(max-width: 600px)" );
      if (mq.matches){
        dropDownListToggle(list);
      }

    });

    function dropDownListToggle(list) {
      list.slideToggle(function(){
        $(this).css('width', '100%');
      });
    }

  } // doDDL function

  //Responsive BG images
  responsiveBG();

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

  // Not Clickable
  $('.not-clickable').on('click', function() {
    return false;
  });

})(jQuery)
