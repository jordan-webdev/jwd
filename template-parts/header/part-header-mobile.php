<?php
/*
* Mobile button, menu, logo and phone icon
*/

$images = get_template_directory_uri() . '/images';
$mobile_logo = get_field("mobile_logo", "options");
?>

<div class="header-mobile__wrapper padding-site">
  <div class="container-site">
    <nav class="header-mobile">

      <!-- Logo -->
      <a class="header-mobile__logo" href="<?php echo get_home_url(); ?>" rel="home">
        <?php echo wp_get_attachment_image( $mobile_logo, "full", false, array("class" => "") ); ?>
        <span class="screen-reader-text"><?php bloginfo("name"); ?>
        </span>
      </a>

      <!-- Menu -->
      <button id="js-mobile-menu-toggle" class="header-mobile__button header-mobile__icon js-scroll-blocker" aria-controls="mobile-menu" aria-expanded="false" data-toggles="#mobile-menu">
        <img src="<?php echo $images; ?>/menu-min.png" alt="Toggle menu." />
        <span class="screen-reader-text">Click to toggle the navigation menu.</span>
      </button>

    </nav>
  </div>
</div>


<!-- Mobile navigation (placed outside header-mobile to prevent flex miscalculation) -->
<nav id="mobile-site-navigation" class="mobile-navigation header-mobile__navigation">
  <?php $args = array(
    'menu' => 11,
    "menu_id" => "mobile-menu",
    "menu_class" => "wp-nav-menu header-mobile__menu",
  );
  wp_nav_menu($args); ?>
</nav>
