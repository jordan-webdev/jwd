(function() {
  tinymce.create("tinymce.plugins.shortcode_buttons", {

    //url argument holds the absolute url of our plugin directory
    init: function(ed, url) {

      /* ****** [align-center] ******* */

      ed.addButton("align_center", {
        title: "Align Center Vertically",
        cmd: "align_center_command",
        // Icon made by https://www.flaticon.com/authors/dave-gandy from https://www.flaticon.com/"
        image: window.location.origin + "/wp-content/themes/jwd/images/tinyMCE/adjust-contrast.png",
      });

      ed.addCommand("align_center_command", function() {
        var return_text = "[align-center]REPLACE_ME[/align-center]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

      /* ****** [half-items] ******* */

      ed.addButton("half_items", {
        title: "Half Items",
        cmd: "half_items_command",
        // Icon made by https://www.flaticon.com/authors/dave-gandy from https://www.flaticon.com/"
        image: window.location.origin + "/wp-content/themes/jwd/images/tinyMCE/adjust-contrast.png",
      });

      ed.addCommand("half_items_command", function() {
        var return_text = "[half-items]<br/>[half]<br/><br/>[/half]<br/>[half]<br/><br/>[/half]<br/>[/half-items]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

    },

    createControl: function(n, cm) {
      return null;
    },

    getInfo: function() {
      return {
        longname: "Extra TinyMCE Buttons",
        author: "Jordan Carter",
        version: "1"
      };
    }
  });

  tinymce.PluginManager.add("shortcode_buttons", tinymce.plugins.shortcode_buttons);
})();
