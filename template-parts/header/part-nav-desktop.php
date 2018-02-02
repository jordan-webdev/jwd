<?php
/*
 * Navigation menu items and request quote button for desktop
 */
?>

<div class="nav-desktop__wrapper">

  <div class="nav-desktop">

    <div class="padding-site top-bar">
      <div class="container-site">
        <?php get_template_part('template-parts/header/part', 'top-bar'); ?>
      </div>
    </div>

    <div class="padding-site">
      <div class="container-site">
        <?php get_template_part('template-parts/header/part', 'middle-bar'); ?>
      </div>
    </div>

    <div class="padding-site color-primary--bg">
      <div class="container-site">
        <?php get_template_part('template-parts/header/part', 'bottom-bar'); ?>
      </div>
    </div>

    <!-- Popup toggle -->
    <!--<label class="btn nav-desktop__btn js-scroll-blocker" for="quote-popup">
      Request a quote
      <span class="screen-reader-text">Click here to open the popup.</span>
    </label>-->

    <!-- Request quote popup is located in the footer -->

  </div>

</div>
