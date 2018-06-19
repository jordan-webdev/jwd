<?php
// List of Careers
function display_careers_shortcode( $atts , $content = null ) {
  ob_start();

  $args = array(
    'post_type' => 'career',
    'posts_per_page' => -1,
  );
  $query = new WP_Query($args);
  ?>

   <?php if ( $query->have_posts() ): ?>
     <section class="careers">
       <h2 class="careers__title">Current Opportunities</h2>
       <ul class="careers__list">
         <?php while ( $query->have_posts() ):
           $query->the_post();
           $title = get_the_title();
           $pdf = get_field('careers_pdf');
         ?>
          <li class="careers__list-item">
            <?php if ($pdf): ?>
              <a class="careers__pdf-wrapper" href="<?php echo esc_url($pdf); ?>" rel="noopener noreferrer" target="_blank">
                <span class="careers__pdf-text">PDF</span>
              </a>
            <?php endif; ?>
            <span class="careers_career-title"><?php echo esc_html($title); ?></span>
          </li>
        <?php endwhile; ?>
      </ul>
     </section>
   <?php endif; wp_reset_postdata(); ?>

	<?php return ob_get_clean();
}
add_shortcode( 'display_careers', 'display_careers_shortcode' );
