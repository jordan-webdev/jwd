(function($) {

  $('.js-toggler').each(function() {
    var toggler = $(this);
    var toggle_item = toggler.attr("data-toggles");
    var return_toggler = toggler.attr('data-return-toggler');
    toggler.on('click', function() {
      slide_toggler(toggler, toggle_item, return_toggler);
    });
  })

  function slide_toggler(toggler, toggle_item, return_toggler) {
    toggler.toggleClass('is-active');
    $('.' + return_toggler).toggleClass('is-shown');
    $('#' + toggle_item).slideToggle();
  }

})(jQuery)
