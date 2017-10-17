<?php
// Side by Side Items
function side_items_shortcode( $atts , $content = null ) {
  // Attributes
	$atts = shortcode_atts(
		array(
			'align' => 'top',
		),
		$atts,
		'side-items'
	);

  $align = $atts['align'];

  switch ($align) {
    case 'top':
      $align = "align-start";
      break;

    case 'center':
      $align = "align-center";
      break;

    case 'bottom':
      $align = "align-bottom";
      break;

  }

	$content = str_replace(array("<p></p>", "<p>&nbsp;</p>", "&nbsp;"), "", $content);
	return '<div class="side-side flex '.$align.'">' .do_shortcode($content) .'</div>';
}
add_shortcode( 'side_items', 'side_items_shortcode' );

// Side Item
function side_item_shortcode( $atts , $content = null ) {

	$content = str_replace(array("<p></p>", "<p>&nbsp;</p>", "&nbsp;"), "", $content);
	return '<div class="side-items__item flex-shrink-0">' .$content.'</div>';
}
add_shortcode( 'side_item', 'side_item_shortcode' );
