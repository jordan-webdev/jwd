<?php
/*
 * Hero banner for the home page
 */

$text = get_field("hero_text");
$img = get_field("hero_img");
?>

<div class="hero">
  <div class="hero__text mar-b-30">
    <?php echo $text; ?>
  </div>

  <a href="#water-solutions" class="hero__scroll flex column align-center">
    <?php echo wp_get_attachment_image( $img, "full", false, array("class" => "hero__img mar-b-10") ); ?>
    <p class="hero__scroll-text font-tert">Scroll down to check <br> our water solutions</p>
  </a>

</div>
