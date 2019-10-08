<?php
/*
 * Main Slider. Multi slider that supports IMG and Video.
 * Usually used on the home page
 */

$main_slider = get_field("main_slider");
$slider = $main_slider['slider'];
?>

<div class="main-slider swiper-container">
  <div class="swiper-wrapper">

    <?php foreach ($slider as $slide):
      $img = $slide['img'];
      $vid = $slide['vid'];
    ?>
      <div class="swiper-slide">

        <!-- IMG Slide -->
        <?php if ($img): ?>
          <?php echo wp_get_attachment_image( $img, "full", false, array("class" => "img") ); ?>
        <?php endif; ?>

        <!-- Video slide -->
        <?php if ($vid): ?>
          <video class="vid" loop playsinline muted poster="">
            <source src="<?php echo esc_url($vid); ?>" type="video/mp4">
          </video>
        <?php endif; ?>

      </div>
    <?php endforeach; ?>

  </div>

  <!-- NAV -->
  <div class="swiper-button-prev nav-btn">
    <?php echo wp_get_attachment_image( $main_slider['prev'], "full", false, array("class" => "icon") ); ?>
  </div>
  <div class="swiper-button-next nav-btn">
    <?php echo wp_get_attachment_image( $main_slider['next'], "full", false, array("class" => "icon") ); ?>
  </div>
</div>
