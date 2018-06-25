<?php
/**
 * Template Name: Q & A
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */
get_header();
?>

<?php get_template_part('template-parts/part', 'inner-hero'); ?>

<div id="primary" class="content-area padding-site">
	<main id="main" class="site-main container-site">

    <section class="page-wrapper">
  			<div class="grid-x grid-margin-x">

          <!-- Categories -->
  				<div class="cell medium-5 large-4">
						<?php
							$sidebar = get_field("sidebar");
							$title = $sidebar['title'];
						  $tax = "faq_category";
						  include(locate_template("template-parts/part-category-sidebar.php"));
						?>
  				</div>

          <!-- Results -->
  				<div id="js-ajax-scroll-to" class="cell medium-7 large-8 js-ajax-content-container">
						<div class="js-ajax-results">

              <?php
								$type = esc_html(get_field("post_type"));
								$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
								$args = array(
									"post_type" => $type,
									"posts_per_page" => 5,
									"paged" => $paged,
								);

								// Category
								if (array_key_exists("cat", $_GET)){
									$args['tax_query'] = array(
										array(
											"taxonomy" => "faq_category",
											"field" => "slug",
											"terms" => $_GET['cat'],
										),
									);
								}

								$query = new WP_Query($args);
								if ($query->have_posts()) :
									while ( $query->have_posts() ) : $query->the_post();
										get_template_part('template-parts/q-a/part', 'accordions');
	              	endwhile;
								endif; ?>

								<!-- Pagination -->
						  	<?php pagination($query); wp_reset_postdata(); ?>
						</div>
  				</div>



  			</div>
    </section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
