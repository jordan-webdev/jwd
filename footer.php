<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jwd
 */

?>

	</div><!-- #content -->

	<?php get_template_part('template-parts/part', 'go-to-top'); ?>

	<footer id="colophon" class="site-footer">
    <?php get_template_part('template-parts/footer/part', 'site-map'); ?>
    <div class="padding-site widget-4">
      <div class="container-site grid-x">
        <?php if (is_active_sidebar("widget-4")): ?>
          <?php dynamic_sidebar("widget-4") ?>
        <?php endif; ?>
      </div>
    </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
