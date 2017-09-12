<?php
/**
 * The template for displaying an index of taxonomy custom posts with ajax animations
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */
get_header();
$query_obj = get_queried_object();
$tax = $query_obj->taxonomy;
$tax_id = $query_obj->term_taxonomy_id;
$tax_parent = $query_obj->parent;
$tax_id = $tax_parent ? $tax_parent : $tax_id;
$is_blog_category = $tax == "blog_category" ? true : false;
?>

	<div id="primary" class="content-area padding-site">

		<main id="main" class="site-main container-site">

      <div class="site-content-wrapper">
        <section class="relative">

    			<div class="clear container-site news-wrapper two-column-wrapper flex">
            <!-- Categories -->
    				<div class="two-column-item">
    					<?php get_template_part('template-parts/blog/part', 'category-select-column'); ?>
    				</div>

            <!-- Results -->
    				<div id="js-blog-listing-results" class="two-column-item flex-grow-1 js-ajax-content-container">
							<div class="height-100 js-category-results">
	              <?php
								while ( have_posts() ) : the_post();
										if ($is_blog_category){
											get_template_part('template-parts/blog/part', 'category-description-column');
										} else{
											 get_template_part('template-parts/part', 'tax-accordions');
										}
	              endwhile; ?>
							</div>
    				</div>
    			</div>
          <!-- Pagination -->
          <div class="ajax-pagination">
            <?php ajax_archive_pagination(); ?>
          </div>
        </section>
      </div>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
