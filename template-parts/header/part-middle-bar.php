<?php
/*
 * Middle bar for desktop nav
 */
?>

<div class="middle-bar flex space-between font-sec">

  <!-- Logo -->
  <div class="desktop-logo middle-bar__logo">
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

  <div class="middle-bar__options flex font-13">

    <div class="middle-bar__quote flex align-end mar-r-35">
      <div class="flex align-center">
        <?php $id = 76; ?>
        <?php echo wp_get_attachment_image( $id, "full", false, array("class" => "middle-bar__icon mar-r-10") ); ?>
        <a class="middle-bar__text color-primary" href="<?php echo get_permalink (77); ?>">REQUEST A QUOTE</a>
      </div>
    </div>

    <div class="middle-bar__consult flex align-end">
      <div class="flex align-center">
        <?php $id = 75; ?>
        <?php echo wp_get_attachment_image( $id, "full", false, array("class" => "middle-bar__icon mar-r-10") ); ?>
        <a class="middle-bar__text color-primary" href="<?php echo get_permalink (79); ?>">GET A FREE WATER TEST / CONSULTATION</a>
      </div>

    </div>

  </div>


</div>
