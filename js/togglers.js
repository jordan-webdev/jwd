(function($) {

  $('.tax-accordions__pullout').slideUp(1);
  $('body').on('click', '.tax-accordions__toggler', function() {
    var arrow = $(this);
    var pullout = $(this).next('.tax-accordions__pullout');

    $('.tax-accordions__accordion').not($(this).parent()).removeClass('active');
    $(this).parent('.tax-accordions__accordion').toggleClass('active');
    $('.tax-accordions__pullout').not(pullout).slideUp().toggleClass('active');
    pullout.slideToggle();

    // Rotate the arrow
    $('.tax-accordions__accordion .tax-accordions__arrow').css('transform', 'rotate(180deg)');
    $('.tax-accordions__accordion.active .tax-accordions__arrow').css('transform', 'rotate(0)');
  });

})(jQuery)
