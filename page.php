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

$login_page_id = get_field("login_page", "options");

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
				
				                elseif (is_page($login_page_id)) {
							// Login
							get_template_part('template-parts/login/content', '');
						}
				
						elseif (is_page(1)) {
							// 1
							get_template_part('template-parts/1/content', '');
						}
				
						elseif (is_page(2)) {
							// 2
							get_template_part('template-parts/2/content', '');
						}
				
						elseif (is_page(3)) {
							// 3
							get_template_part('template-parts/3/content', '');
						}
				
						elseif (is_page(4)) {
							// 4
							get_template_part('template-parts/4/content', '');
						}
				
						elseif (is_page(5)) {
							// 5
							get_template_part('template-parts/5/content', '');
						}
				
						elseif (is_page(6)) {
							// 6
							get_template_part('template-parts/6/content', '');
						}
				
						elseif (is_page(7)) {
							// 7
							get_template_part('template-parts/7/content', '');
						}
				
						elseif (is_page(8)) {
							// 8
							get_template_part('template-parts/8/content', '');
						}
				
						elseif (is_page(9)) {
							// 9
							get_template_part('template-parts/9/content', '');
						}
				
						elseif (is_page(10)) {
							// 10
							get_template_part('template-parts/10/content', '');
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
