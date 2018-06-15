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
										"posts_per_page" => 2,
										"paged" => $paged,
									);
									$query = new WP_Query($args);
									if ($query->have_posts()) :
										while ( $query->have_posts() ) : $query->the_post();
											get_template_part('template-parts/q-a/part', 'accordions');
		              	endwhile;
									endif; ?>
							</div>
    				</div>

						<!-- Pagination -->
				  	<?php pagination($query); wp_reset_postdata(); ?>

    			</div>
      </section>
		</main><!-- #main -->
	</div><!-- #primary -->



<?php
get_footer();
