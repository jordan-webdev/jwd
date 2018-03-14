<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jwd
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while (have_posts()) : the_post(); ?>

				<div class="padding-site">
				  <div class="container-site">
				    <?php //get_template_part('template-parts/blog/content', get_post_format()); ?>
						<?php if (!is_singular("product")): ?>
							<?php get_template_part('template-parts/blog/content', 'blog'); ?>
						<?php else: ?>
							<?php get_template_part( 'template-parts/products/content', 'product' ); ?>
						<?php endif; ?>
				  </div>
				</div>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
