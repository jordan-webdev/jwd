<?php
/*
 * Middle bar for desktop nav
 */

$bg = get_field("header_bg", "options");
$logo = get_field('logo', 'options');
$is_front_page = is_front_page();
?>

  <!-- Logo -->
  <div class="logo">
    <?php if ($is_front_page): ?>
      <h1>
    <?php endif; ?>
      <a href="<?php echo get_home_url(); ?>" rel="home" class="block">
        <?php echo wp_get_attachment_image( $logo, "full", false, array("alt" => get_bloginfo("name")) ); ?>
        <span class="screen-reader-text"><?php bloginfo( "name" ); ?></span>
      </a>
    <?php if ($is_front_page): ?>
      </h1>
    <?php endif; ?>
  </div>

  <!-- Menu -->
  <?php
  $args = array(
      'menu' => 11,
      'menu_class' => 'wp-nav-menu main-nav',
  );
  wp_nav_menu($args);
 ?>
