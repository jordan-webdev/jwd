<?php
/**
 * The sidebar for index pages, such as blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jwd
 */

$args = array(
	'taxonomy' => $tax,
  'hide_empty' => false,
	'exclude' => 1,
);
$categories = get_terms($args);
$chosen_cat = array_key_exists('cat', $_GET) ? $_GET['cat'] : false;
$base_link = isset($base_link) ? $base_link : get_the_permalink(get_the_ID())
?>

<aside id="secondary" class="category-sidebar">
	<h2 class="title"><?php echo esc_html($title); ?></h2>

	<ul class="list">
	  <?php $i = 0; foreach ($categories as $c):
			$slug = $c->slug;
			$is_active = $i == 0 && !$_GET || $chosen_cat == $slug;
		?>
	  	<li class="item">
	  	  	<a class="link js-ajax-link js-category-selector-link <?php echo $is_active ? "active" : ""; ?>" href="<?php echo $base_link; ?>?cat=<?php echo $slug; ?>"><?php echo $c->name; ?></a>
	  	</li>
	  <?php $i++; endforeach; ?>
	</ul>

</aside><!-- #secondary -->
