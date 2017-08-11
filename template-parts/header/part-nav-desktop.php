<?php
/*
 * Navigation menu items and request quote button for desktop
 */
?>

<div class="nav-desktop__wrapper padding-site">

  <div class="nav-desktop flex align-center container-site">

    <!-- Nav menu -->
    <nav id="site-navigation" class="nav-desktop__nav flex-grow-1">
      <?php
        $args = array(
            'theme_location' => 'menu-1',
            'menu_id' => 'primary-menu',
            'menu_class' => 'wp-nav-menu nav-desktop__menu flex',
        );
        wp_nav_menu($args);
      ?>
    </nav>

    <!-- Popup toggle -->
    <label class="btn nav-desktop__btn js-scroll-blocker" for="quote-popup">
      Request a quote
      <span class="screen-reader-text">Click here to open the popup.</span>
    </label>

    <!-- Request quote popup is located in the footer -->

  </div>

</div>
