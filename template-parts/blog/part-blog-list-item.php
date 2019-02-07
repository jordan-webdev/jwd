<?php
/*
 * Blog Index List Item
 */

$id = get_the_ID();
$tax = isset($tax) ? $tax : "blog_category";
$category = get_the_terms($id, $tax)[0];
$cat_name = $category->name;

$g = get_field('blog_index_options');
$img = $g['img'];
$title = get_the_title();
$date = get_the_date();
$type = $g['type'];
$text = $g['excerpt'];
$link = false;
$link_text = false;
$new_tab = true;

switch ($type) {
  case 1:
    // Blog Post
    $link_text = get_field("blog_post_text", "options");
    $link = get_the_permalink();
    $new_tab = false;
    break;

  case 2:
    // External Article
    $link_text = get_field("article_text", "options");
    $link = $g['external_link'];
    break;

  case 3:
    // External Video
    $link_text = get_field("video_text", "options");
    $link = $g['external_link'];
    break;

  case 4:
    // PDF File
    $link_text = get_field("pdf_text", "options");
    $link = $g['pdf'];
    break;
}

?>

<div class="grid-x grid-margin-x">
  <div class="img-wrap cell large-5">
    <?php echo wp_get_attachment_image( $img, "full", false, array("class" => "img") ); ?>
  </div>

  <div class="content cell large-7">
    <span class="cat"><?php echo $cat_name; ?></span>
    <h2 class="title"><?php echo $title; ?></h2>
    <span class="date"><?php echo $date; ?></span>
    <p class="text"><?php echo esc_html($text); ?></p>
    <a class="btn" href="<?php echo esc_url($link); ?>"<?php echo $new_tab ? " target=\"blank\" rel=\"noopener noreferrer\"" : ""; ?>>
      <?php echo esc_html($link_text); ?>
    </a>
  </div>
</div>
