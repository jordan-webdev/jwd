(function($) {



  $(document).on('keydown', function(event) {
    if (event.keyCode == 27) {
      $('.js-modal.active').removeClass("active");
    }
  });



})(jQuery)
