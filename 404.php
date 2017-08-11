<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package jwd
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section id="post-<?php the_ID(); ?>" <?php post_class('error-404'); ?>>
			<header class="entry-header">
				<h1 class="entry-title">This page does not exist.</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<a class="visit-home-page color-primary" href="<?php echo get_home_url(); ?>">Click here to visit the home page.</a>
			</div><!-- .entry-content -->
		</section><!-- #post-## -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

