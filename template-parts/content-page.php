<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jwd
 */

?>

<article id="post-<?php the_ID(); ?>" <?php body_class(); ?>>

	<div class="padding-site">
	  <div class="container-site">
			<div class="entry-content clear">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
	  </div>
	</div>


	<?php if ( get_edit_post_link() ) : ?>
		<div class="padding-site">
		  <div class="container-site">
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
		  </div>
		</div>
	<?php endif; ?>
</article><!-- #post-## -->
