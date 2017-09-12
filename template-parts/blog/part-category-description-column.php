<?php
/**
 * Template part for displaying the details of the categories chosen from the select category menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

$blog_category = get_the_terms($post->ID, 'blog_category')[0];
$blog_category_slug = $blog_category->slug;
$blog_category_name = $blog_category->name;
$single_slug = $post->post_name;
?>

		<?php
			$external = get_field('external_link');
			$youtube = get_field('youtube_link');
			$pdf = get_field('pdf_upload');
			$preview = get_field('preview_image');

			$link_types = array(
				$external => "Go to Article",
				$youtube => "Watch Video",
				$pdf => "Download PDF",
			);
			$link = "";
			$link_text = "";
			foreach($link_types as $url => $text ){
				if ($url){
					$link = $url;
					$link_text = $text;
				}
			}
			$external_link = $link ? true : false;
			$link_text = $link_text ? $link_text : "Read More";
			$link = $link ? $link : get_the_permalink();
		?>

    <div class="pad-b-15 pad-l-15 pad-r-15 blog-item-padding-wrapper">
  		<article class="blog-item-wrapper clear <?php echo $blog_category_slug; ?> all">
  			<div class="blog-preview-item">
  				<?php if ($external_link) : ?>
  					<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
  						<?php
  							if ($preview) {
  								echo '<img class="news-thumb-preview block" src="' . $preview['url'] . '" alt="' . $preview['alt'] . '" />';
  							}
  						?>
  					</a>
  				<?php else: ?>
            <!-- Preview image for internal stories -->
  					<a
              class="js-blog-ajax-link"
              href="<?php echo esc_url($link); ?>"
              data-slug="<?php echo $blog_category_slug; ?>"
              data-single-slug="<?php echo $single_slug; ?>"
            >
  						<?php
  							$preview = get_field('preview_image');
  							if ($preview)
  								echo '<img class="news-thumb-preview block" src="' . $preview['url'] . '" alt="' . $preview['alt'] . '" />';
  						?>
  					</a>
  				<?php endif; ?>
  			</div>
  			<div class="blog-preview-item">
  				<?php if ($external_link): ?>
            <!-- External Article/PDF/Youtube -->
						<!-- Category -->
						<span class="blog-preview__cat color-primary font-14"><?php echo esc_html($blog_category_name); ?></span>
  					<a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
  						<h3
                class="color-secondary news-preview-title font-18 mar-t-10 mar-b-10"
                data-slug="<?php echo $blog_category_slug; ?>"
                data-single-slug="<?php echo $single_slug; ?>"
              >
                <?php echo get_the_title(); ?>
              </h3>
  					</a>
						<!-- Date -->
						<div class="news-preview-date-wrapper">
	            <!--<span class="fa fa-calendar-o color-primary" aria-hidden="true"></span>-->
	  					<span class="blog-preview-author color-dark-grey font-14 block mar-b-10"><?php echo get_the_date('F j, Y'); ?></span>
	  				</div>
  					<p class="body-font news-media-excerpt font-14 color-black"><?php echo get_the_content(); ?></p>
  					<a class="btn btn--has-arrow" href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($link_text); ?></a>
  				<?php else: ?>
            <!-- Internal Story -->
						<!-- Category -->
						<span class="blog-preview__cat color-primary font-14"><?php echo esc_html($blog_category_name); ?></span>
  					<a
              href="<?php echo esc_url($link); ?>"
              class="js-blog-ajax-link"
              data-slug="<?php echo $blog_category_slug; ?>"
              data-single-slug="<?php echo $single_slug; ?>"
            >
              <h3 class="color-secondary news-preview-title font-18 mar-t-10 mar-b-10">
                <?php echo get_the_title(); ?>
              </h3>
  					</a>
						<!-- Date -->
						<div class="news-preview-date-wrapper">
	            <!--<span class="fa fa-calendar-o color-primary" aria-hidden="true"></span>-->
	  					<span class="blog-preview-author color-dark-grey font-14 block mar-b-10"><?php echo get_the_date('F j, Y'); ?></span>
	  				</div>
  					<p class="body-font news-media-excerpt font-14 color-black"><?php echo get_excerpt(150, false); ?></p>
						<a class="btn btn--has-arrow js-ajax-link" href="<?php echo esc_url($link); ?>"><?php echo esc_html($link_text); ?></a>
  				<?php endif; ?>

  			</div>
  		</article>
    </div>
