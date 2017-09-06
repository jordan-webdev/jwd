<?php
/*
 * Sitemap. Includes desktop and mobile version
 */
?>

<?php
$grouped_items = array();
$all_items = array();

  for ($i = 1; $i <= 9; $i++) {
      if (is_active_sidebar('footer-' .$i)) {

          //Get the widget contents
          ob_start();
          dynamic_sidebar('footer-' .$i);
          $widget = ob_get_contents();
          ob_end_clean();

          //Push into the ungrouped list for mobile
          array_push($all_items, $widget);

          //Push into a grouped array for desktop
          $j = $i - 5 > 0 ? $i - 5: $i;
          if (array_key_exists('item_' .$j, $grouped_items)) {
              $grouped_items['item_' .$j] .= $widget;
          } else {
              $grouped_items['item_' .$j] = $widget;
          }
      }
  }
?>

<!-- Desktop -->
<section class="sitemap__wrapper color-quaternary--bg padding-site">
  <ul class="sitemap container-site">
    <?php foreach ($grouped_items as $item) : ?>
      <?php
        $search = '/id="[^"]*"/';
        $replace = "";
      ?>
      <li class="sitemap__item"><?php echo preg_replace($search, $replace, $item); ?></li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- Mobile -->
<section class="sitemap__wrapper color-quaternary--bg padding-site">
  <ul class="sitemap sitemap--mobile container-site">
    <?php foreach ($all_items as $item) : ?>
      <?php
        $search = '/id="[^"]*"/';
        $replace = "";
      ?>
      <li class="sitemap__item"><?php echo preg_replace($search, $replace, $item); ?></li>
    <?php endforeach; ?>
  </ul>
</section>
