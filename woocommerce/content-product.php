<?php
/*
 * Content products. Used in the related products module.
 */

$id = get_the_ID();
$img = get_post_thumbnail_id($id);
?>

<li class="product">
  <a class="link" href="<?php echo get_permalink($id) ?>">
    <div class="thumb-wrap">
      <?php echo wp_get_attachment_image( $img, "full", false, array("class" => "thumb") ); ?>
    </div>

    <h2 class="title"><?php echo get_the_title($id); ?></h2>
  </a>
</li>
