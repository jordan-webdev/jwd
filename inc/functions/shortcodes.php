<?php

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

// Generate Subscription Form
function generate_subscription_form( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'interval' => '',
		),
		$atts
	);

	?>
	<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_xclick-subscriptions">
	<input type="hidden" name="business" value="me@mybusiness.com">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="no_shipping" value="1">
	<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but20.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	<input type="hidden" name="a3" value="5.00">
	<input type="hidden" name="p3" value="1">
	<input type="hidden" name="t3" value="M">
	<input type="hidden" name="src" value="1">
	<input type="hidden" name="sra" value="1">
	</form>
	<?php

}
add_shortcode( 'subscription_form', 'generate_subscription_form' );