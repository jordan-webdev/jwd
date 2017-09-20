(function($) {

  $('.js-toggler').each(function() {
    var toggler = $(this);
    var toggle_item = toggler.attr("data-toggles");
    var return_toggler = toggler.attr('data-return-toggler');
    toggler.on('click', function() {
      slide_toggler(toggler, toggle_item, return_toggler);
    });
  })

  // Our services return toggle
  $('.our-services__list').on('click', '.our-services__list-item.is-shown', function() {
    var toggler = $('.our-services__ddtoggle');
    $('.our-services__list-item').toggleClass('is-shown');
    $('#js-our-services__drop-list').slideToggle();
  });

  // Location dropdown button
  active_toggle('.appointment-filters__location-btn');

  function slide_toggler(toggler, toggle_item, return_toggler) {
    toggler.toggleClass('is-active');
    $('.' + return_toggler).toggleClass('is-shown');
    $('#' + toggle_item).slideToggle();
  }

  function active_toggle(el) {
    $(el).on('click', function() {
      $(this).toggleClass("is-active");
    })
  }
})(jQuery)
