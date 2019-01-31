<?php
/*
* Mobile button, menu, logo and phone icon
*/

$uploads = get_home_url() . '/wp-content/uploads';
$mobile_logo = get_field("mobile_logo", "options");
$phone_icon = get_field("phone_icon", "options");
$map_icon = get_field("map_icon", "options");
$menu_icon = get_field("menu_icon", "options");
?>

<div class="padding-site header-mobile">
  <div class="container-site">
    <nav class="menu">

      <!-- Logo -->
      <a class="logo" href="<?php echo get_home_url(); ?>" rel="home">
        <?php echo wp_get_attachment_image( $mobile_logo, "full", false, array("alt" => get_bloginfo("name")) ); ?>
        <span class="screen-reader-text"><?php bloginfo("name"); ?>
        </span>
      </a>

      <!-- Icons -->
      <div class="icons">
        <!-- Phone -->
        <a class="icon-wrap phone" href="<?php echo esc_url($phone_url); ?>">
          <?php echo wp_get_attachment_image( $phone_icon, "full", false, array("class" => "icon") ); ?>
        </a>

        <!-- Map -->
        <a class="icon-wrap map" href="<?php echo get_permalink(15) ?>">
          <?php echo wp_get_attachment_image( $map_icon, "full", false, array("class" => "icon") ); ?>
        </a>

        <!-- Menu -->
        <button id="js-mobile-menu-toggle" class="icon js-scroll-blocker" aria-controls="mobile-menu" aria-expanded="false" data-toggles="#mobile-menu">
          <?php echo wp_get_attachment_image( $menu_icon, "full", false, array("class" => "icon", "alt" => "Toggle menu") ); ?>
          <span class="screen-reader-text">Click to toggle the navigation menu.</span>
        </button>
      </div>


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
