<?php
/*
 * Module: Main Popup
 */

$main_popup = get_field("main_popup", "options");
?>

<button class="main-popup" type="button">
  <span class="screen-reader-text">Click to close popup</span>
  <span class="layout">
    <?php echo wp_get_attachment_image( $main_popup['img'], "full", false, array("class" => "img") ); ?>
  </span>
</button>
