(function($) {

  var host_name = "https://" + window.location.hostname;

  $.jwd_dropdown_init = function(item = false) {
    $(".jwd-dropdown").each(function() {
      select = $(this);
      var existing = select.next(".jwd-dde");
      if (existing.length < 1) {
        var selected = select.find("option:selected").text();
        var element = "<div class=\"jwd-dde\">";
        element += "<button class=\"jwd-dde__selected\" type=\"button\"> <span class=\"jwd-dde__selected-inner\"><span class=\"jwd-dde__selected-text\">" + selected + "</span><img class=\"jwd-dde__icon\" src=\"" + host_name + "/wp-content/uploads/more-min.png\" alt=\"\" /></span></button>";
        element += "<ul class=\"jwd-dde__list\">";

        $(select).find("option").each(function() {
          element += "<li class=\"jwd-dde__item\"><button class=\"jwd-dde__item-btn\" type=\"button\" data-val=\"" + $(this).val() + "\">" + $(this).text() + "</button></li>"
        });

        element += "</ul></div>"
        select.after(element);
      }
    });

    $('.jwd-dde__item-btn').on('click', function() {
      // On drop down click, update values

      var jwd_dde = $(this).closest(".jwd-dde");
      var list = jwd_dde.find('.jwd-dde__list');
      var select = jwd_dde.prev(".jwd-dropdown");
      var val = $(this).data("val");
      var text = $(this).text();
      update_jwd_dd(jwd_dde, list, select, val, text);
    });

    $('.jwd-dde').on("jwd-update-dde", function() {
      // Update jwd-dde with the corresponding <select> value

      var jwd_dde = $(this);
      var list = jwd_dde.find('.jwd-dde__list');
      var select = $(this).prev(".jwd-dropdown");
      var val = $(select).val();
      var text = $(select).find("option:selected").text();
      update_jwd_dd(jwd_dde, list, select, val, text);
    });

    $('.jwd-dde').on("mouseenter", function() {
      $(this).find(".jwd-dde__list").addClass('active');
    });
    $('.jwd-dde').on("mouseleave", function() {
      $(this).find(".jwd-dde__list").removeClass('active');
    });
  }

  function update_jwd_dd(jwd_dde, list, select, val, text) {

    select.find("option:selected").prop("selected", false);
    select.find("option[value=\"" + val + "\"]").prop("selected", true);
    jwd_dde.find(".jwd-dde__selected-text").text(text);

    // Trigger change event
    jwd_dde.trigger("jwd-change");

    // Hide the dropdown
    list.removeClass("active");
  }

  // Convert a select of class "jwd-drop-down" to a custom drop down element

  $.jwd_dropdown_init();

  $(document).on("jwd-dropdown-init", function() {
    $.jwd_dropdown_init();
  });




})(jQuery)
