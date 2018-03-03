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

		<div class="padding-site sitemap">
		  <div class="container-site">
		    <?php get_template_part('template-parts/footer/part', 'site-map'); ?>
		  </div>
		</div>


    <div class="copyright padding-site">
      <div class="grid container-site">
        <?php get_template_part('template-parts/footer/part', 'copyright'); ?>
      </div>
    </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
