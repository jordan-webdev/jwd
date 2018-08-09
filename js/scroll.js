(function($) {

  // Smooth Scroll
  smoothScroll();

  // Set off all scroll events after a timer, only for desktop
  var mq = window.matchMedia("(min-width: 1000px)");
  if (mq.matches) {
    setTimeout(function() {
      scrollEffects();
    }, 500);
  }

  function scrollEffects() {

    // Store the top positions of all scroll elements in an array, to be referenced against the window scroll
    var scrollPoints = [];
    $('.js-scroll').each(function() {
      scrollPoints.push($(this).offset().top + ($(this).height() / 1.25));
    });

    // Scroll Animations, based on HTML data attributes that reference CSS classes (done on page load after timer set above)
    doScrollEffects($(window), scrollPoints);

    $(window).on('scroll', function() {
      // Scroll Animations, based on HTML data attributes that reference CSS classes
      doScrollEffects($(this), scrollPoints);

      // Sticky Navigation
      sticky_nav($(this).scrollTop());

      // *** ADD OTHER FUNCTIONS HERE **** //
    });

    function doScrollEffects(win, scrollPoints) {
      var pageBottom = win.scrollTop() + win.height();
      $.each(scrollPoints, function(index, value) {
        var el = $('.js-scroll').eq(index);
        var outAnim = el.attr('data-anim-out');
        var inAnim = el.attr('data-anim-in');
        var offset = el.data('offset');
        value = offset ? value - offset : value;

        if (pageBottom > value) {
          if (outAnim && inAnim) {
            el.removeClass(outAnim).addClass(inAnim);
          }
        } else {
          if (outAnim && inAnim) {
            el.removeClass(inAnim).addClass(outAnim);
          }
        }
      });
    }
  }

  //Scroll Blocker
  scrollBlocker();

  function scrollBlocker() {
    $('body').on('click', '.js-scroll-blocker', function(event) {
      //CSS popup click event. The label might accidentally get selected rather than clicked, so
      //we must check for that
      var element = event.target.nodeName;
      if (element == 'LABEL') {
        var input = $(this).attr('for');
        var sel = getSelection().toString();
        //Only create the scroll blocker if there's no text selection
        if (!sel) {
          $('body').toggleClass('scroll-blocker');
          $('html').toggleClass('scroll-blocker');
        }
        return;
      }

      //Normal click event
      $('body').toggleClass('scroll-blocker');
      $('html').toggleClass('scroll-blocker');
    });
  }

  function smoothScroll() {
    // Select all links with hashes
    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .not('.js-no-scroll')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(
            /^\//, '') &&
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +
            ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();

            var endingPosition = $(this).attr('data-offset') ? parseInt(target.offset().top) + parseInt($(this).attr('data-offset')) : target.offset().top;
            $('html, body').animate({
              scrollTop: endingPosition
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });
  }

  function sticky_nav(scroll_top) {
    if (scroll_top > 150) {
      $('#sticky-navigation').addClass('active');
    } else {
      $('#sticky-navigation.active').removeClass('active');
    }
  }

})(jQuery)
