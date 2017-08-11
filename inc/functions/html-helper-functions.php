<?php //Functions to make writing HTML faster and easier

if ( ! function_exists('jwd_address') ){
	function jwd_address($address = "", $class = ""){
		$address = $address ? $address : get_field('site_address', 'options');
		$class = $class == "" ? "" : " " . $class;
		$html = '<a class="address link' .$class. '" href="' .esc_url('https://www.google.ca/maps/place/' .$address). '" target="_blank" rel="noopener noreferrer">';
		$html .= esc_html($address);
		$html .='</a>';
		echo $html;
	}
}

if ( ! function_exists('jwd_email') ){
	function jwd_email($email = "", $class = ""){
		$email = $email ? $email : get_field('site_email', 'options');
		$class = $class == "" ? "" : " " . $class;
		echo '<a class="email link' .$class. '" href="mailto:' .esc_url($email). '" target="_blank" rel="noopener noreferrer">' .esc_html($email). '</a>';
	}
}

if ( ! function_exists('jwd_img') ){
	/* Parameters
		$img: ACF image array or file name
		$class: HTML class
		$properties: If not using ACF image. Array(width, height, alt)
		$return: Whether to return or echo the html
	*/

	function jwd_img($img, $class="", $properties = "", $return = false){
		$class = $class == "" ? "" : " " . $class;
		$img_is_array = is_array($img); //Is it an ACF image array?
		$url = $img_is_array ? $img['url'] : get_template_directory_uri() . '/images/' .$img;
		$width = $img_is_array ? $img['width'] : $properties['width'];
		$height = $img_is_array ? $img['height'] : $properties['height'];
		$alt = $img_is_array ? $img['alt'] : $properties['alt'];
		$padding = $height / $width * 100 . '%';

		$html = '<div class="image' .$class. '" style="padding-bottom: ' .esc_attr($padding). ';">';
		$html .= '<img src="' .esc_url($url). '" width="' .esc_attr($width). '" height="' .esc_attr($height). '" alt="' .esc_attr($alt). '" />';
		$html .= '</div>';

		if ($return){ return $html; }else{ echo $html;}
	}
}

function ACF_phone($num, $class=""){
	$class = $class == "" ? "" : " " . $class;
	echo '<a class="link phone' .$class. '" href="tel:' .esc_url($num). '" target="_blank" rel="noopener noreferrer">' .esc_html($num). '</a>';
}

function ACF_text($text, $tag = "p", $class=""){
	$class = $class == "" ? "" : " " . $class;
	echo '<'.$tag.' class="text' .$class. '">' .esc_html($text). '</'.$tag.'>';
}

function ACF_title($title, $tag="h2", $class=""){
	$class = $class == "" ? "" : " " . $class;
	echo '<'.$tag.' class="entry-title' .$class. '">' .esc_html($title). '</'.$tag.'>';
}

function fa($arg, $class=""){
  $class = $class == "" ? "" : " " . $class;
	echo '<span class="fa fa-' .$arg.$class. '" aria-hidden="true"></span>';
}
function get_fa($arg){
	return '<span class="fa fa-' .$arg. '" aria-hidden="true"></span>';
}

function loader(){
	echo '<div class="loader-wrapper"><img class="loader" src="' .get_template_directory_uri(). '/ajax-loader.gif" alt="Loading, please wait..." /></div>';
}

function jwd_link($url, $text, $class=""){
	$class = $class == "" ? "" : " " . $class;
	echo '<a class="link' .$class. '" href="' .esc_url($url). '" target="_blank" rel="noopener noreferrer">' .esc_html($text). '</a>';
}
function jwd_get_link($url, $text, $class=""){
	$class = $class == "" ? "" : " " . $class;
	return '<a class="link' .$class. '" href="' .esc_url($url). '" target="_blank" rel="noopener noreferrer">' .esc_html($text). '</a>';
}

function site_description($class){
	$class = $class == "" ? "" : " " . $class;
	$description = get_bloginfo( 'description', 'display' );
	if ($description) : ?>
		<p class="site-description<?php echo $class; ?>"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	<?php endif;
}
