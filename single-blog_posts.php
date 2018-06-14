<?php
/**
 *
 * The template for single blog posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

    <div class="city-content">

      <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part('template-parts/blog/content', 'blog'); ?>
      <?php endwhile; ?>

    </div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
