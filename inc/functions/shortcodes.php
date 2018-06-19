<?php

// ********** Template shortcodes ***********
require get_template_directory() . '/inc/functions/template-shortcodes/template-shortcodes.php';

// Align Center
function align_center_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'pad-l' => 'false',
			'type' => 'p',
		),
		$atts,
		'align-center'
	);

	$pad_l = $atts['pad-l'];
	$type = $atts['type'];

	return '<'.$type.' class="flex align-center ' .( $pad_l != "false" ? 'pad-l-' .$pad_l : ''). '">' .$content .'</'.$type.'>';
}
add_shortcode( 'align-center', 'align_center_shortcode' );

// Center shortcode
function generate_center_shortcode( $atts , $content = null ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 'p',
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
	return '<div class="half-items '.$show_p.'">' .do_shortcode($content) .'</div>';
}
add_shortcode( 'half-items', 'generate_half_items_shortcode' );

// Add half Shortcode
function generate_half_shortcode( $atts , $content = null ) {
	return '<div class="half-items__item">' .do_shortcode($content).'</div>';
}
add_shortcode( 'half', 'generate_half_shortcode' );

// Add Text Highlight shortcode
function highlight_shortcode( $atts , $content = null ) {
	return '<span class="color-primary">' . $content . '</span>';
}
add_shortcode( 'highlight', 'highlight_shortcode' );

// Highlight BG
function grey_bg_shortcode($atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'pad-t' => '',
			'pad-b' => '',
			'strip-p' => 'true',
			'type'	=> 'div',
		),
		$atts,
		'grey-bg'
	);
	$pad_t = $atts['pad-t'];
	$pad_b = $atts['pad-b'];
	$type = $atts['type'];
	$content = $atts['strip-p'] != "false" ? str_replace(array("<p>", "</p>"), "", $content) : $content;

	return '<'.$type.' class="color-grey--bg color-primary pad-t-5 pad-b-5 pad-l-15 pad-r-15 '.($pad_t ? 'pad-t-' .$pad_t : '').' '.($pad_b ? 'pad-b-' .$pad_b : '').'">' . do_shortcode($content) . '</'.$type.'>';
}
add_shortcode( 'grey-bg', 'grey_bg_shortcode' );

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
	$html = '<div class="block-quote clear">';
	$html .= '<blockquote class="block-quote__quote">'.$content.'</blockquote>';
	$html .= '<span class="block-quote__author">'.$author.'</span>';
	$html .= '</div>';

	return $html;

}
add_shortcode( 'quote', 'quote_shortcode' );
