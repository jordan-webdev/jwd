<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

?>

<?php get_template_part('template-parts/part', 'breadcrumb'); ?>
<?php get_template_part('template-parts/part', 'intro'); ?>

<div class="padding-site">
	<article id="post-<?php the_ID(); ?>" <?php body_class('container-site mar-t-15 mar-b-15'); ?>>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'jwd' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article><!-- #post-## -->
</div>
