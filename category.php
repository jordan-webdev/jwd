<?php
/**
 *
 * All of the product categories
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

 //$term_id = get_queried_object()->term_id;
 //$category_children = get_term_children($term_id, 'category');

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


      <?php if ( have_posts() ) :
        else:
      ?>
        <div class="padding-site">
          <p class="container-site no-results">
            Sorry, no posts match this search criteria. <br>
            <a class="color-primary" href="<?php echo get_home_url(); ?>">Home</a>
          </p>
      </div>
    <?php endif; ?>

		</main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
