<?php
/**
 * Template part for displaying a select list of the categories in a column.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

// This module requires a custom hierarchical taxonomy to be created, with "All" as the ancestor


$query_obj = get_queried_object();

$term_name = $query_obj->name;
$taxonomy = $query_obj->taxonomy;
// If it's a single blog post, the query object will not contain data about the taxonomy, so it's specified here
$taxonomy = $taxonomy ? $taxonomy : 'blog_category';
$all_term = get_term_by( 'slug', 'all', $taxonomy );
$all_term_id = $all_term->term_id;

?>

<div id="category-wrapper">

	<h2 id="js-category-wrapper-title" class="font-16 bold color-secondary js-categories-wrapper-toggle">
    CATEGORIES
    <span class="screen-reader-text">Click to expand categories</span>
  </h2>

	<div id="categories-wrapper">

		<div id="categories">

      <?php
        $args = array(
    			'child_of' => $all_term_id,
    			'taxonomy' => $taxonomy,
    		);

			$categories = get_categories($args); ?>

			<!-- All -->
				<a href="<?php echo get_term_link($all_term_id); ?>" data-slug="all" class="js-category-selector-link">
					<span
            class="block all-categories-selector sub-header <?php echo ($term_name == "All" ? "color-primary js-selected-category" : ""); ?>"
            data-slug="all"
          >
            All
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </span>
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
  			<a href="<?php echo get_term_link($id); ?>" data-slug="<?php echo $slug; ?>" class="js-category-selector-link">
  				<span
            class="block sub-header <?php echo ($is_listing_match ? "color-primary js-selected-category" : ""); ?>"
            data-slug="<?php echo $data_category; ?>"
          >
            <?php echo $label; ?>
            <i class="fa fa-chevron-right black" aria-hidden="true"></i>
          </span>
  			</a>

			<?php endforeach; ?>

		</div>

	</div>

</div>
