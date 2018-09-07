(function($) {

  var images = window.location.origin + "/wp-content/themes/jwd-master/images";

  //Side Slider Mobile menu
  sideSliderMenu(true, true); //parameters (bool $add_logo, bool $fade_banner)
  function sideSliderMenu(logo, fadeBanner) {

    //Slide in on menu click
    $('#js-mobile-menu-toggle').on('click', function() {
      var menu = $(this).attr('data-toggles');
      $(menu).toggleClass('active');
      $('.sub-menu.active').removeClass('active');

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
        '<img class="arrow left-arrow" src="' + images + '/pull-menu-left-min.png" alt="" />' +
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
        '<img class="arrow right-arrow" src="' + images + '/pull-menu-right-min.png" alt="" />'
      )
    });

    //Menu navigation sliding
    $('#mobile-menu .menu-item-has-children').on('click', function() {
      $('> .sub-menu', this).toggleClass('active');
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
        '<div id="menu-fade-banner" class="fade-banner js-scroll-blocker"></div>');
      $('#menu-fade-banner').on('click', function() {
        menu.each(function() {
          $(this).removeClass('active');
        });
        setTimeout(function() {
          $(this).remove();
        }, 01);
      });
    } else {
      $('#menu-fade-banner').remove();
    }
  }

})(jQuery)
