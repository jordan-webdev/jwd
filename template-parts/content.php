<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

$query_obj = get_queried_object();
$categories = get_categories( array(
    'parent'  => 0 //this parameter is important for top level category
    )
);
$ancestor_category = $categories[0]->term_id;

$title = get_the_title();
?>

<article id="post-<?php the_ID(); ?>" <?php body_class('padding-site site-content-wrapper'); ?>>

  <div class="product-description container-site">
    <header class="product-description__header">
      <h2 class="product-description__title color-secondary"><?php echo $title; ?></h2>
    </header><!-- .entry-header -->

    <div class="product-description__grid">
      <!-- Image + Link for larger image -->
      <div class="product-description__image-wrapper">
        <?php
          $link = get_the_post_thumbnail_url();
          $smaller_size = get_the_post_thumbnail_url($post->ID, 'medium');
        ?>
        <img class="product-description__image" src="about:blank" alt="<?php echo esc_attr($title); ?>" data-src=<?php echo $smaller_size; ?> />
        <a data-fancybox="product-image" class="product-description__view-larger-link mar-b-15 color-primary" href="<?php echo esc_url($link); ?>">View Larger Image</a>
      </div>

      <!-- Product Content -->
      <div class="product-description__content color-secondary">
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        <div class="product-description__cta-buttons">

          <label
            class="btn product-description__quote-btn mar-r-15 js-scroll-blocker"
            for="product-description__checkbox"
            <?php
              $categories = get_the_category();
              foreach ($categories as $category):
                  if ($category->category_parent != 0): ?>
                    data-category="<?php echo $category->cat_name; ?>"
                    <?php break; ?>
                  <?php endif; ?>
              <?php endforeach; ?>
            data-src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>"
            data-alt="<?php echo esc_attr($alt); ?>"
            data-title="<?php echo get_the_title(); ?>"
            data-content="<?php echo esc_html(wpautop( get_the_content(), true )); ?>"
          >
            Request a quote for <?php echo get_the_title(); ?>
          </label>

          <?php
            $link = get_post_meta($post->ID, 'product_pdf', true);
            $link = $link ? get_home_url() .'/wp-content/uploads/' .$link : false;
          ?>
          <?php if ($link): ?>
            <a class="btn btn--reversed btn--reversed-border" href="<?php echo esc_url($link); ?>" rel="noopener noreferrer" target="_blank">Download PDF</a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <!-- Popup Form -->
  <?php get_template_part('template-parts/part', 'product-popup-form'); ?>

  <section class="csv-data container-site flex column">
    <h2 class="csv-data__title color-secondary--bg color-white">Specifications</h2>
    <?php
      $all_meta = get_post_meta($post->ID);

      // Custom order that the meta fields get displayed, based on repeater in the category editor
      $meta_orders = array();

      if ( have_rows("text_ordering", 'category_' . $ancestor_category) ) :
        while ( have_rows("text_ordering", 'category_' . $ancestor_category) ) :
          the_row();
          $meta_key = get_sub_field("text_ordering_key");
          $order = get_sub_field("text_ordering_order");
          $meta_orders[$meta_key] = $order;
        endwhile;
      endif;

      // Output the meta, and use flexbox to order it
      foreach ($all_meta as $key => $value):
        if (strpos($key, 'text_') !== false):
          $csv_header = $key;
          $csv_header_modified = str_replace(array("text_", "_"), array("", " "), $key);
          $flex_order = "";
          $style = "";
          // Text ordering
          if($meta_orders){
            foreach($meta_orders as $key_to_match => $order){
              if ($key_to_match == $csv_header){
                $flex_order = $order;
                $style = "style=\"-webkit-box-ordinal-group:" .$flex_order. ";-webkit-order:" .$flex_order. ";-ms-flex-order:" .$flex_order. ";order:" .$flex_order. ";\"";
                break;
              }
            }
          }
      ?>
          <div class="csv-data__row <?php if ($flex_order) { echo ($flex_order % 2 == 0 ? "even" : "odd"); } ?>" <?php echo ($flex_order ? $style : ""); ?>>
            <h3 class="csv-data__row-title bold"><?php echo $csv_header_modified; ?></h3>
            <p class="csv-data__row-text"><?php echo $value[0]; ?></p>
          </div>

        <?php endif; ?>
      <?php endforeach; ?>

  </section>

	<footer class="entry-footer container-site">
		<?php jwd_entry_footer();?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
