<?php
/**
 * The template for displaying single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <div class="padding-site">
        <div class="container-site">
          <div class="site-content-wrapper">
      			<?php
      			while ( have_posts() ) : the_post();
      			?>

      			<section class="two-column-wrapper flex flex-wrap" class="clear site-container">
							<!-- Categories -->
      				<div class="two-column-item">
      					<?php get_template_part('template-parts/blog/part', 'category-select-column'); ?>
      				</div>

							<!-- Results -->
      				<div id="js-blog-listing-results" class="two-column-item flex-grow-1 js-ajax-content-container">
								<div class="height-100 js-category-results">
      						<?php get_template_part('template-parts/blog/content', 'blog'); ?>
								</div>
      				</div>
      			</section>

      			<?php
      			endwhile; // End of the loop.
      			?>
          </div>
        </div>
      </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
