<?php
/**
 * The Template for displaying all single products, modified within this theme
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes & Jordan Webdev
 * @package 	WooCommerce/Templates & jwd
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while (have_posts()) :
      the_post();
      get_template_part('template-parts/part', 'breadcrumb');
    ?>
    <!-- Small slice of Breadcrumb bg image, so that product gallery may overlap it -->
    <div
			class="jwd-wc-product-description__extra-bg"
      style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/breadcrumb-bg.jpg);"
    >
    </div>

      <div class="padding-site">
        <div class="container-site">
          <?php get_template_part('template-parts/content', 'product'); ?>
        </div>
      </div>

    <?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
