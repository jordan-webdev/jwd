<?php

// Social Media
function social_media_shortcode( $atts , $content = null ) {
  // Attributes
	$atts = shortcode_atts(
		array(
			'pad-l' => 'false',
		),
		$atts,
		'social-media'
	);

  $pad_l = $atts['pad-l'];

  ob_start(); ?>

  <?php if (have_rows('social_media', 'options')): ?>
    <ul class="social-media flex flex-wrap align-center <?php echo( $pad_l != "false" ? 'pad-l-' .$pad_l : ''); ?>">
      <?php while (have_rows('social_media', 'options')): the_row(); ?>
        <?php
        $name = get_sub_field('social_media_name');
        $name_lower = strtolower($name);
        $link = get_sub_field('social_media_link');
        ?>
        <li class="social-media__list-item mar-r-10">
          <a class="social-media__link" href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
            <span class="fa fa-<?php echo esc_attr($name_lower); ?> color-primary"></span>
            <span class="screen-reader-text"><?php echo esc_html($name); ?></span>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php return ob_get_clean();
}
add_shortcode( 'social-media', 'social_media_shortcode' );
