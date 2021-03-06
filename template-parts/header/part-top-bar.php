<?php
/*
 * Top Bar for the desktop header
 */

//$menu = get_navbar_items(2);
$menu = false; // Remove this and the if check when ready. It is set like this to avoid outputting errors
?>

<?php if ($menu): ?>


  <div class="inner">

    <nav class="menu">
      <ul class="list">
        <?php foreach ($menu as $menu_item):
          $classes = "link " . get_menu_classes($menu_item);
          $child_items = $menu_item->child_items;
        ?>
          <li class="item">
            <a class="<?php echo $classes; ?>" href="<?php echo esc_url($menu_item->url); ?>">
              <?php echo esc_html($menu_item->title); ?>
            </a>

            <?php if ($child_items): ?>
              <div class="sub-list-wrap">
                <ul class="sub-list">
                  <?php foreach ($child_items as $child_item):
                    $classes = "link " . get_menu_classes($child_item);
                  ?>
                    <li class="sub-item">
                      <a class="<?php echo $classes; ?>" href="<?php echo esc_url($child_item->url); ?>">
                        <?php echo esc_html($child_item->title); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

  </div>

<?php endif; ?>
