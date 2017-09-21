<?php

// Template shortcodes
require get_template_directory() . '/inc/functions/template-shortcodes/template-shortcodes.php';

// Center shortcode
function generate_center_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => '',
		),
		$atts,
		'center'
	);

	$type = $atts['type'];

	return '<'.$type.' class="text-center mar-l-auto mar-r-auto">' .$content .'</'.$type.'>';
}
add_shortcode( 'center', 'generate_center_shortcode' );

// Add half-items Shortcode
function generate_half_items_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'show-p' => '',
		),
		$atts,
		'half-items'
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
	return '<span class="color-primary">' . $content . '</span>';
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

// Quote
function quote_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'author' => '',
		),
		$atts,
		'quote'
	);

	$author =  $atts['author'];
	$html = '<div class="block-quote color-secondary">';
	$html .= '<blockquote class="block-quote__quote mar-b-15">'.$content.'</blockquote>';
	$html .= '<span class="block-quote__author block">'.$author.'</span>';
	$html .= '</div>';

	return $html;

}
add_shortcode( 'quote', 'quote_shortcode' );
