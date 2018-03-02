<?php
/*
 * Middle bar for desktop nav
 */
?>

<div class="grid-x align-center">

  <!-- Since Img -->
  <div class="cell large-4 since-img">
    <?php if (is_active_sidebar("widget-1")): ?>
      <?php dynamic_sidebar("widget-1") ?>
    <?php endif; ?>
    <?php if (is_active_sidebar("widget-2")): ?>
      <?php dynamic_sidebar("widget-2") ?>
    <?php endif; ?>

    <!-- Button -->
    <?php if (is_active_sidebar("widget-5")): ?>
      <?php dynamic_sidebar("widget-5") ?>
    <?php endif; ?>
    <?php if (is_active_sidebar("widget-6")): ?>
      <?php dynamic_sidebar("widget-6") ?>
    <?php endif; ?>
  </div>


  <!-- Logo -->
  <div class="desktop-logo middle-bar__logo cell large-4 justify-center">
    <?php if (is_front_page()): ?>
      <h1>
    <?php endif; ?>
      <a href="<?php echo get_home_url(); ?>" rel="home" class="block">
        <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="<?php bloginfo( "title" ); ?>">
        <span class="screen-reader-text"><?php bloginfo( "name" ); ?></span>
      </a>
    <?php if (is_front_page()): ?>
      </h1>
    <?php endif; ?>
  </div>

  <!-- Buttons -->
  <nav class="cell medium-4 btns flex justify-end buttons">
    <?php if (is_active_sidebar("widget-3")): ?>
      <?php dynamic_sidebar("widget-3") ?>
    <?php endif; ?>
    <?php if (is_active_sidebar("widget-4")): ?>
      <?php dynamic_sidebar("widget-4") ?>
    <?php endif; ?>
  </nav>

</div>
