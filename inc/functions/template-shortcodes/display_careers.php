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
       <h2 class="careers__title color-white color-primary--bg font-secondary pad-l-15 pad-t-5 pad-b-5 font-18">Current Opportunities</h2>
       <ul class="careers__list color-grey--bg">
         <?php while ( $query->have_posts() ):
           $query->the_post();
           $title = get_the_title();
           $pdf = get_field('careers_pdf');
         ?>
          <li class="careers__list-item flex align-center pad-t-15 pad-b-15 mar-l-15 mar-r-15 color-med-grey--bor-b">
            <a class="careers__pdf-wrapper mar-r-10 color-primary--bg" href="<?php echo esc_url($pdf); ?>" rel="noopener noreferrer" target="_blank">
              <span class="careers__pdf-text color-white">PDF</span>
            </a>
            <span class="careers_career-title"><?php echo esc_html($title); ?></span>
          </li>
        <?php endwhile; ?>
      </ul>
     </section>
   <?php endif; wp_reset_postdata(); ?>

	<?php return ob_get_clean();
}
add_shortcode( 'display_careers', 'display_careers_shortcode' );
