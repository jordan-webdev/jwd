<?php
/*
 * Sticky Navigation
 */
?>

<div id="sticky-navigation" class="sticky-nav red-gradient padding-site">
  <div class="container-site height-100 relative">

      <div class="nav-desktop__wrapper width-100">

        <div class="nav-desktop flex align-center height-100 absolute">

          <!-- Nav menu -->
          <nav id="site-navigation" class="nav-desktop__nav flex-grow-1 height-100 flex space-between color-white font-primary med font-14 relative">
            <!-- Left Nav -->
            <?php
              $args = array(
                  'theme_location' => 'left-nav',
                  'menu_id' => 'nav-menu-left',
                  'menu_class' => 'wp-nav-menu nav-desktop__menu flex height-100',
                  'container_class' => 'nav-desktop__menu-wrapper nav-desktop__menu-wrapper--left absolute height-100',
              );
              wp_nav_menu($args);
            ?>

            <!-- Logo -->
            <div class="wp-nav-menu nav-desktop__menu flex">
              <a class="" href="<?php echo get_home_url(); ?>">
                <img src="<?php echo esc_url(get_field('mobile_logo', 'options')); ?>" alt="<?php echo bloginfo("title"); ?>">
              </a>
            </div>

            <!-- Right Nav -->
            <?php
              $args = array(
                  'theme_location' => 'right-nav',
                  'menu_id' => 'nav-menu-right',
                  'menu_class' => 'wp-nav-menu nav-desktop__menu flex height-100',
                  'container_class' => 'nav-desktop__menu-wrapper nav-desktop__menu-wrapper--right absolute height-100',
              );
              wp_nav_menu($args);
            ?>
          </nav>

        </div>

      </div>

  </div>
</div>
