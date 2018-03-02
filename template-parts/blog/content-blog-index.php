<?php
/**
 * The template for displaying an index of taxonomy custom posts with ajax animations
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */
get_header();
?>

<div class="padding-site">
  <div class="container-site">

    <?php
			$blurb = get_field("blurb");
			$icon = $blurb['icon'];
			$id = $icon ? $icon : get_field("home_icon", 230);
			$stroke_id = 91;
			$htag = 1;
			$title = $blurb['title'];
      include(locate_template("template-parts/part-blurb.php"));
    ?>

    <div class="blog-index grid-x grid-margin-x">
      <!-- Categories -->
    	<div class="cell medium-5 large-4">
    		<?php
          $sidebar = get_field("sidebar");
          $tax = "category";
          $title = $sidebar['title'];
          $include_checklist = true;
          $check_title = $sidebar['check_title'];
          $img = $sidebar['img'];
          $link = $sidebar['link'];
          $link_text = $sidebar['link_text'];
          $page_url = get_permalink(352);
          include(locate_template("sidebar.php"));
        ?>
    	</div>

      <!-- Results -->
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$chosen_cat = array_key_exists('cat', $_GET) ? $_GET['cat'] : false;
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 5,
				'paged' => $paged,
				'post__not_in' => array(367),
				'category_name' => $chosen_cat,
			);
			$query = new WP_Query($args);

			if ( $query->have_posts() ): ?>
	    	<div id="js-ajax-scroll-to" class="cell medium-7 large-8 blog-list js-ajax-content-container">

					<div class="js-ajax-results">
						<ul class="list">
							<?php while ( $query->have_posts() ): $query->the_post(); ?>
					     	<li class="item">
					     	  <?php get_template_part('template-parts/blog/part', 'blog-list-item'); ?>
					     	</li>
				   		<?php endwhile; ?>
		    		</ul>

						<?php pagination($query); ?>
					</div>

	    	</div>
			<?php endif; wp_reset_postdata(); ?>
    </div>

  </div>
</div>

<?php
get_footer();
