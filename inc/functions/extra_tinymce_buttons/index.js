(function() {

  tinymce.create("tinymce.plugins.shortcode_buttons", {

    //url argument holds the absolute url of our plugin directory
    init: function(ed, url) {

      /* ****** [align-center] ******* */

      ed.addButton("align_center", {
        title: "Align Center Vertically",
        cmd: "align_center_command",
        // Icon made by http://www.freepik.com from https://www.flaticon.com/, is licensed by http://creativecommons.org/licenses/by/3.0/
        image: window.location.origin + "/wp-content/themes/jwd-master/images/tinyMCE/distribute-to-center.png",
      });

      ed.addCommand("align_center_command", function() {
        var return_text = "[align-center]REPLACE_ME[/align-center]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

      /* ****** [four-col] ******* */

      ed.addButton("four_col", {
        title: "Four Col",
        cmd: "four_col_command",
        // Icon made by http://www.freepik.com from https://www.flaticon.com/, is licensed by http://creativecommons.org/licenses/by/3.0/
        image: window.location.origin + "/wp-content/themes/jwd-master/images/tinyMCE/quarter.png",
      });

      ed.addCommand("four_col_command", function() {
        var return_text = "[four-col]<br/>[four-col-item]<br/>CONTENT<br/>[/four-col-item]<br/>[four-col-item]<br/>CONTENT<br/>[/four-col-item]<br/>[four-col-item]<br/>CONTENT<br/>[/four-col-item]<br/>[four-col-item]<br/>CONTENT<br/>[/four-col-item]<br/>[/four-col]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

      /* ****** [half-items] ******* */

      ed.addButton("half_items", {
        title: "Half Items",
        cmd: "half_items_command",
        // Icon made by https://www.flaticon.com/authors/dave-gandy from https://www.flaticon.com/, is licensed by http://creativecommons.org/licenses/by/3.0/
        image: window.location.origin + "/wp-content/themes/jwd-master/images/tinyMCE/adjust-contrast.png",
      });

      ed.addCommand("half_items_command", function() {
        var return_text = "[half-items]<br/>[half]<br/>LEFT_CONTENT<br/>[/half]<br/>[half]<br/>RIGHT_CONTENT<br/>[/half]<br/>[/half-items]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

      /* ****** [three-col] ******* */

      ed.addButton("three_col", {
        title: "Three Col",
        cmd: "three_col_command",
        // Icon made by http://www.freepik.com from https://www.flaticon.com/, is licensed by http://creativecommons.org/licenses/by/3.0/
        image: window.location.origin + "/wp-content/themes/jwd-master/images/tinyMCE/pie-chart-divided-in-three-equal-sections.png",
      });

      ed.addCommand("three_col_command", function() {
        var return_text = "[three-col]<br/>[three-col-item]<br/>CONTENT<br/>[/three-col-item]<br/>[three-col-item]<br/>CONTENT<br/>[/three-col-item]<br/>[three-col-item]<br/>CONTENT<br/>[/three-col-item]<br/>[/three-col]";
        ed.execCommand("mceInsertContent", 0, return_text);
      });

      /* ****** END ******* */

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
