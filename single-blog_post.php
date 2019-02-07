<?php
/**
 *
 * The template for single blog posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

get_header();
$bg = get_field("page_bg");
$bg = $bg ? $bg : get_field("default_page_bg", "options");
?>

<?php get_template_part('template-parts/part', 'inner-hero'); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

    <div class="padding-site page-content">

			<?php echo wp_get_attachment_image( $bg, "full", false, array("class" => "page-bg") ); ?>

      <div class="container-site grid-x grid-margin-x">
				<?php while ( have_posts() ) : the_post(); ?>

					<!-- Categories -->
		    	<div class="cell large-4">
		    		<?php
		          $sidebar = get_field("sidebar", 147);
		          $tax = "blog_category";
		          $title = $sidebar['title'];
							$base_link = get_permalink(147);
		          include(locate_template("template-parts/part-category-sidebar.php"));
		        ?>
		    	</div>

					<div class="cell large-8">
						<?php get_template_part('template-parts/blog/content', 'blog'); ?>
					</div>

	      <?php endwhile; ?>
      </div>
    </div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
