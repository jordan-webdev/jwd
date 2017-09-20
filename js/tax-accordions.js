(function($) {

  $('.tax-accordions__pullout').slideUp(1);
  $('body').on('click', '.tax-accordions__toggler', function() {
    var arrow = $(this);
    var pullout = $(this).next('.tax-accordions__pullout');
    $(this).parent('.tax-accordions__accordion').toggleClass('active');
    $('.tax-accordions__pullout').not(pullout).slideUp().toggleClass('active');
    pullout.slideToggle();
  });

})(jQuery)
