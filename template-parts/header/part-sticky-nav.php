<?php
/*
 * Sticky Navigation
 */

$sticky_logo = get_field("sticky_logo", "options");
?>

<div id="sticky-navigation" class="sticky-nav padding-site">
  <div class="container-site layout">

    <!-- Logo -->
    <div class="logo-wrap">
      <a href="<?php echo get_home_url(); ?>" rel="home" class="block">
        <?php echo wp_get_attachment_image( $sticky_logo, "full", false, array("class" => "") ); ?>
        <span class="screen-reader-text"><?php bloginfo( "name" ); ?></span>
      </a>
    </div>

    <!-- Menu -->
    <?php
    $args = array(
        'menu' => 11,
        'menu_class' => 'wp-nav-menu main-nav',
    );
    wp_nav_menu($args);
   ?>

  </div>
</div>
