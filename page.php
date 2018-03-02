<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php get_template_part('template-parts/part', 'inner-hero'); ?>

			<div class="page-wrapper">
				<?php
					while ( have_posts() ) : the_post();

						if (is_page(135)) {
							// Become a Retailer
							get_template_part('template-parts/become-retailer/content', 'become-retailer');
						}

						elseif (is_page(352)) {
							// Blog
							get_template_part('template-parts/blog/content', 'blog-index');
						}

						else{
							get_template_part( 'template-parts/content', 'page' );
						}

				endwhile; // End of the loop.
				?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
