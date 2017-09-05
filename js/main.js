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

  //Side Slider Mobile menu
  sideSliderMenu(true, true); //parameters (bool $add_logo, bool $fade_banner)
  function sideSliderMenu(logo, fadeBanner) {

    //Slide in on menu click
    $('#js-mobile-menu-toggle').on('click', function() {
      var menu = $(this).attr('data-toggles');
      console.log(menu);
      $(menu).toggleClass('js-left-0');
      $('.sub-menu.js-left-0').removeClass('js-left-0');

      if (fadeBanner) {
        menu = [$(menu), $('.sub-menu')];
        menuFadeBanner($(menu));
      }
    });

    //Setup submenus with headers and chevrons
    $('#mobile-menu .sub-menu').each(function() {
      $(this).prepend(
        '<li class="sub-menu-header">' +
        '<button class="sub-menu-back-button">' +
        '<span class="fa fa-chevron-left fa-lg" aria-hidden="true"></span>' +
        '</button>' +
        $(this).prev('a').text() +
        '</li>');

      $('.sub-menu-back-button').each(function() {
        $(this).on('click', function() {
          $(this).closest('.sub-menu').toggleClass('js-left');
        });
      });
    });

    //Setup haschildren chevrons and wrappers
    $('#mobile-menu .menu-item-has-children').each(function() {
      $('> a', this).wrap(
        '<div class="menu-item-has-children-items-wrapper">').after(
        '<span class="fa fa-chevron-right" aria-hidden="true"></span>')
    });

    //Menu navigation sliding
    $('#mobile-menu .menu-item-has-children').on('click', function() {
      $('> .sub-menu', this).toggleClass('js-left-0');
    });
    $(
      '#mobile-menu .menu-item-has-children .sub-menu .menu-item:not(.menu-item-has-children) a'
    ).on('click', function(e) {
      e.stopPropagation();
    });

    //Logo
    if (logo) {
      $('#mobile-menu').prepend(
        '<li class="menu-logo-wrapper">' +
        '<a href="' + localizedVar.homeURL + '" >' +
        '<img class="menu-logo-img" src="' + localizedVar.headerImage +
        '" alt="' + localizedVar.blogTitle + '"/>' +
        '</a>' +
        '</li>'
      );

      // Add request appointment button
      var request_appointment_btn = $('.nav-desktop__btn').clone();
      $('.menu-logo-wrapper').append(request_appointment_btn);
      $('.menu-logo-wrapper .nav-desktop__btn').addClass('mar-b-15 mar-l-15');

    }

  }

  //Fade banner (needed for side slider)
  function menuFadeBanner(menu) {
    if ($('#menu-fade-banner').length == 0) {
      $('.site-header').prepend(
        '<div id="menu-fade-banner" class="fade-banner"></div>');
      $('#menu-fade-banner').on('click', function() {
        menu.each(function() {
          $(this).removeClass('js-left-0');
        });
        $(this).remove();
      });
    } else {
      $('#menu-fade-banner').remove();
    }
  }

  // Not Clickable
  $('.not-clickable').on('click', function() {
    return false;
  });

  //Scroll
  var mq = window.matchMedia( "(min-width: 1000px)" );
  if (mq.matches){
    setTimeout(function() {
      scrollEffects();
    }, 500);
  }

  function scrollEffects() {
    var scrollPoints = [];
    $('.js-scroll').each(function() {
      scrollPoints.push($(this).offset().top + ($(this).height() / 1.25));
    });

    doScrollEffects($(window)); //Do on page load
    $(window).on('scroll', function() { //Do on scroll
      doScrollEffects($(this));
    });

    function doScrollEffects(win) {
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
        }else{
          if (outAnim && inAnim) {
            el.removeClass(inAnim).addClass(outAnim);
          }
        }
      });
    }
  }

  //Scroll Blocker
  //scrollBlocker();

  function scrollBlocker(){
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

  //Smooth Scroll
  smoothScroll();

  function smoothScroll() {
    // Select all links with hashes
    $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .not('.cd-btn')
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
              scrollTop: endingPosition - 150
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

})(jQuery)
