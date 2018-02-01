<?php
/*
 * Bottom Bar for desktop nav
 */
?>

<div class="bottom-bar font-sec">
  <?php
  $args = array(
      'menu' => 9,
      'menu_class' => 'wp-nav-menu bottom-bar__menu flex',
  );
  wp_nav_menu($args);
   ?>
</div>
