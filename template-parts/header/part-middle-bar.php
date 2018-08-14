<?php
/*
 * Middle bar for desktop nav
 */
?>

<div class="grid-x align-center">

  <!-- Logo -->
  <div class="logo">
    <?php if (is_front_page()): ?>
      <h1>
    <?php endif; ?>
      <a href="<?php echo get_home_url(); ?>" rel="home" class="block">
        <img src="<?php echo esc_url(get_field('logo', 'options')); ?>" alt="<?php bloginfo( "title" ); ?>">
        <span class="screen-reader-text"><?php bloginfo( "name" ); ?></span>
      </a>
    <?php if (is_front_page()): ?>
      </h1>
    <?php endif; ?>
  </div>

</div>
