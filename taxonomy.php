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
    				<div id="js-ajax-scroll-to" class="two-column-item flex-grow-1 js-ajax-content-container">
							<div class="height-100 js-ajax-results">
	              <?php
								while ( have_posts() ) : the_post();
									get_template_part('template-parts/part', 'tax-accordions');
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
