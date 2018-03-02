(function($) {

  $('.accordions__pullout').slideUp(1);
  $('body').on('click', '.accordions__toggler', function() {
    var arrow = $(this);
    var pullout = $(this).next('.accordions__pullout');
    $(this).parent('.accordions__accordion').toggleClass('active');
    $('.accordions__pullout').not(pullout).slideUp().toggleClass('active');
    pullout.slideToggle();
  });

})(jQuery)
