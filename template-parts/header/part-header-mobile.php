<?php
/*
* Mobile button, menu, logo and phone icon
*/
?>

<div class="header-mobile color-primary flex justify-between align-center width-100">

  <button id="js-mobile-menu-toggle" class="header-mobile__button header-mobile__icon color-white" aria-controls="primary-menu" aria-expanded="false" data-toggles="#mobile-menu">
    <!--<img src="<?php //echo $images; ?>/hamburger-min.png" alt="Toggle menu." />-->
    <span class="fa fa-bars header-mobile__hamburger" aria-hidden="true"></span>
    <span class="screen-reader-text">Click to toggle the navigation menu.</span>
  </button>

  <a class="header-mobile__logo" href="<?php echo get_home_url(); ?>" rel="home">
    <img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo("title"); ?>">
    <span class="screen-reader-text"><?php bloginfo("name"); ?>
    </span>
  </a>

  <!-- Phone -->
  <a class="header-mobile__phone header-mobile__icon color-white" href="tel:<?php echo esc_attr(get_field("site_phone", "options")); ?>"><span class="fa fa-phone" aria-hidden="true"></span></a>

</div>

<!-- Mobile navigation (placed outside header-mobile to prevent flex miscalculation) -->
<nav id="mobile-site-navigation" class="mobile-navigation header-mobile__navigation">
  <?php $args = array(
    "theme_location" => "menu-1",
    "menu_id" => "mobile-menu",
    "menu_class" => "wp-nav-menu header-mobile__menu",
  );
  wp_nav_menu($args); ?>
</nav>
