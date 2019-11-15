<?php
/*
 * Module: Main Popup
 */

$main_popup = get_field("main_popup", "options");
?>

<div class="main-popup">
  <?php echo wp_get_attachment_image( $main_popup['img'], "full", false, array("class" => "img") ); ?>
</div>
