<?php
/*
 * Content for the single blog page
 */

$id = get_the_ID();
$category = get_the_terms($id, "blog_category")[0];
$cat_name = $category->name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-wrapper'); ?>>
	<header class="header">

    <!-- Blog Category -->
    <span class="cat"><?php echo $cat_name; ?></span>

    <!-- Title -->
		<h1 class="title"><?php echo get_the_title(); ?></h1>
		<!-- Meta Data -->
		<span class="meta"><?php echo get_the_date('F j, Y'); ?></span>

	</header><!-- .entry-header -->

	<div class="content entry-content clear">
		<?php if (has_post_thumbnail()): ?>
			<div class="thumb-wrap">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

  <!-- Go Back link + Social Media -->
	<footer class="entry-footer">
    <!-- AddToAny BEGIN -->
    <div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php the_permalink(); ?>" data-a2a-title="<?php echo get_the_title(); ?>">
      <span class="share">Share: </span>
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_linkedin"></a>
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    </div>
    <!-- AddToAny END -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
