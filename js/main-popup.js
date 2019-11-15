(function($) {

  var hide_popup = Cookies.get("hide_main_popup");

  if (hide_popup == "y") {
    $('.main-popup').remove();
  }

  $('.main-popup').on('click', function() {
    Cookies.set("hide_main_popup", "y", {
      expires: 1
    });
    $('.main-popup').remove();
  });

})(jQuery)
