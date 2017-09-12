<?php
/*
 * Content for the single blog page
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-news-media pad-15 pad-b-0 clear'); ?>>
	<header class="blog-header single-news-media__header">

    <!-- Thumbnail -->
    <div class="single-news-media__thumbnail-wrapper alignleft">
  		<?php the_post_thumbnail('post-thumbnail', array('class' => 'js-blog-single-thumb no-lazy')); ?>
    </div>

    <!-- Blog Category -->
    <span class="block color-primary font-14 mar-b-15"><?php echo get_the_terms($post->ID, 'blog_category')[0]->name; ?></span>

    <!-- Title -->
		<?php the_title( '<h1 class="color-secondary font-18 mar-b-10">', '</h1>' ); ?>
    <!-- data_category -->
		<div class="blog-preview-publish-wrapper">
			<div class="blog-preview-date-wrapper">
				<!--<span class="fa fa-calendar-o color-primary" aria-hidden="true"></span>-->
				<span class="blog-preview-author font-14 color-dark-grey block mar-b-10"><?php echo get_the_date('F j, Y'); ?></span>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="blog-content entry-content font-14 color-black">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

  <!-- Go Back link + Social Media -->
	<footer class="entry-footer flex space-between flex-wrap">
    <?php
      $blog_categories = get_the_terms($post->ID, 'blog_category');
      $current_blog_category = $blog_categories[0];
      $cat_id = $current_blog_category->term_id;
      $cat_name = $current_blog_category->name;
      $cat_slug = $current_blog_category->slug;
      $cat_link = get_term_link($cat_id, 'blog_category');
    ?>
    <!-- AddToAny BEGIN -->
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style mar-r-10 flex align-center" data-a2a-url="<?php the_permalink(); ?>" data-a2a-title="<?php echo get_the_title(); ?>">
      <span class="color-secondary mar-r-5">Share: </span>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_linkedin"></a>
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
    <!-- AddToAny END -->

    <!-- Go Back Link -->
		<a
      class="blog-back-to-link single-news-media__back-link block js-blog-ajax-link"
      href="<?php echo $cat_link; ?>"
      data-slug="<?php echo $cat_slug; ?>"
    >
			<span class="fa fa-caret-left color-primary" aria-hidden="true"></span>
			<span class="color-primary">Back to <span class="blog-category"><?php echo $cat_name; ?></span></span>
			<span class="blog-category-nice none"></span>
		</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<!-- Pagination (container used for AJAX) -->
<div class="ajax-pagination"></div>
