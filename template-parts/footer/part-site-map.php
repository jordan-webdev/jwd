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
<section class="sitemap__wrapper padding-site">
  <div class="container-site relative">
    <ul class="sitemap">
      <?php foreach ($grouped_items as $item) : ?>
        <?php
          $search = '/id="[^"]*"/';
          $replace = "";
        ?>
        <li class="sitemap__item"><?php echo preg_replace($search, $replace, $item); ?></li>
      <?php endforeach; ?>
    </ul>

    <div class="need-help">
      <?php
        $nh = get_field("need_help", "options");
        $title = $nh['title'];
        $phone = $nh['phone'];
        $email = $nh['email'];
        $social = $nh['social'];
      ?>
      <h2 class="title"><?php echo esc_html($title); ?></h2>
      <div class="text">
        <a class="link block" href="tel:<?php echo esc_attr(str_replace(" ", "", $phone)); ?>"><?php echo esc_html($phone); ?></a>
        <a class="link block" href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
      </div>
      <ul class="footer-social list">
        <?php foreach ($social as $s):
          $link = $s['link'];
          $img = $s['img'];
          $label = $s['label'];
        ?>
          <li class="social-item item">
            <a class="social-link" href="<?php echo esc_url($link); ?>">
              <?php echo wp_get_attachment_image( $img, "full", false, array("class" => "icon") ); ?>
              <span class="screen-reader-text"><?php echo esc_html($label); ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>



</section>

<!-- Mobile -->
<section class="sitemap__wrapper padding-site">
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
