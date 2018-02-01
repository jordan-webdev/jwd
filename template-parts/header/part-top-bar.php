<?php
/*
 * Top Bar for the desktop header
 */

$phone = get_field("site_phone", 'options');
?>

<div class="top-bar flex color-primary">

  <!-- Contact Info -->
  <div class="top-bar__contact">
    <div class="top-bar__bevel"></div>
    <span class="top-bar__contact-text italic mar-r-5">CONTACT US TODAY!</span>
    <a class="font-tert italic" href="tel:<?php echo esc_attr($phone); ?>">
      <span class="fa fa-lg fa-phone" aria-hidden="true"></span>
      <span class="top-bar__phone-number"><?php echo esc_html($phone); ?></span>
    </a>
  </div>

  <!-- Nav -->
  <nav class="top-bar__nav">
    <?php
      $args = array(
          'menu' => 2,
          'menu_class' => 'wp-nav-menu top-bar__menu flex',
      );
      wp_nav_menu($args);
     ?>
  </nav>

</div>
