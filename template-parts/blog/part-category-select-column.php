<?php
/**
 * Template part for displaying a select list of the categories in a column.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

// This module requires a custom hierarchical taxonomy to be created, with "All" as the ancestor


$query_obj = get_queried_object();
$id = $query_obj->ID;

$term_name = $query_obj->name;
$term_name = $term_name ? $term_name : get_the_terms($id, 'blog_category')[0]->name;

$taxonomy = $query_obj->taxonomy;
// If it's a single blog post, the query object will not contain data about the taxonomy, so it's specified here
$taxonomy = $taxonomy ? $taxonomy : 'blog_category';
$all_term = get_term_by( 'slug', 'all', $taxonomy );
$all_term_id = $all_term->term_id;

?>

<div id="category-wrapper" class="category-selector">

	<h2 id="js-category-wrapper-title" class="font-16 bold color-primary js-categories-wrapper-toggle category-selector__toggler mar-b-10">
    CATEGORIES
    <span class="screen-reader-text">Click to expand categories</span>
  </h2>

	<div id="categories-wrapper" class="category-selector__categories-wrapper">

		<div id="categories" class="category-selector__categories">

      <?php
        $args = array(
    			'child_of' => $all_term_id,
    			'taxonomy' => $taxonomy,
    		);

			$categories = get_categories($args); ?>

			<!-- All -->
			<a href="<?php echo get_term_link($all_term_id); ?>" data-slug="all" class="js-category-selector-link js-ajax-link category-selector__category-wrapper flex space-between align-center">
				<span
          class="block all-categories-selector category-selector__category color-white--bg <?php echo ($term_name == "All" ? "color-primary js-selected-category" : ""); ?>"
          data-slug="all"
        >
          All
      	</span>
				<i class="fa fa-chevron-right category-selector__chevron" aria-hidden="true"></i>
			</a>

			<!-- Categories -->
			<?php foreach ($categories as $category) :
        //var_dump($category);
        $id = $category->term_id;
        $data_category = $category->category_nicename;
        $label = $category->name;
        $slug = $category->slug;

        $is_listing_match = $term_name == $label ? true : false;
      ?>
  			<a href="<?php echo get_term_link($id); ?>" data-slug="<?php echo $slug; ?>" class="js-category-selector-link js-ajax-link category-selector__category-wrapper flex space-between align-center">
  				<span
            class="block category-selector__category color-white--bg <?php echo ($is_listing_match ? "color-primary js-selected-category" : ""); ?>"
            data-slug="<?php echo $data_category; ?>"
          >
            <?php echo $label; ?>
          </span>
					<i class="fa fa-chevron-right black category-selector__chevron" aria-hidden="true"></i>
  			</a>

			<?php endforeach; ?>

		</div>

	</div>

</div>
