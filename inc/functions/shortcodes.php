<?php

// Template shortcodes
require get_template_directory() . '/inc/functions/template-shortcodes/template-shortcodes.php';

// Add half-items Shortcode
function generate_half_items_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'show-p' => '',
		),
		$atts,
		'half'
	);
	$show_p = $atts['show-p'] ? "show-p" : "";
	return '<div class="half-items flex flex-wrap space-between '.$show_p.'">' .do_shortcode($content) .'</div>';
}
add_shortcode( 'half-items', 'generate_half_items_shortcode' );

// Add half Shortcode
function generate_half_shortcode( $atts , $content = null ) {
	return '<div class="half-items__item">' .$content .'</div>';
}
add_shortcode( 'half', 'generate_half_shortcode' );

// Add Text Highlight shortcode
function highlight_shortcode( $atts , $content = null ) {
	return '<span class="text-highlight">' . $content . '</span>';
}
add_shortcode( 'highlight', 'highlight_shortcode' );

// Add Text Nowrap shortcode
function nowrap_shortcode( $atts , $content = null ) {
	return '<span class="nowrap">' . $content . '</span>';
}
add_shortcode( 'nowrap', 'nowrap_shortcode' );

// Big
function big_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'size' => '',
		),
		$atts,
		'big'
	);

	$size =  $atts['size'];
	$style = $size !== '' ? 'style="font-size:' . $size . ';"' : "";
	return '<span class="big"' . $style . '>' . $content . '</span>';

}
add_shortcode( 'big', 'big_shortcode' );

// Width
function fix_width_shortcode( $atts , $content = null ) {
	return '<span class="fixed-width">' . $content . '</span>';
}
add_shortcode( 'fix_width', 'fix_width_shortcode' );

// Quote
function quote_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'author' => '',
		),
		$atts,
		'big'
	);

	$author =  $atts['author'];
	$html = '<div class="block-quote color-secondary">';
	$html .= '<blockquote class="block-quote__quote mar-b-15">'.$content.'</blockquote>';
	$html .= '<span class="block-quote__author block">'.$author.'</span>';
	$html .= '</div>';

	return $html;

}
add_shortcode( 'quote', 'quote_shortcode' );
