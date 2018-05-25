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

</div>
