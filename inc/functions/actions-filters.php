<?php

//add_filter( 'the_content', 'img_p_class_content_filter' ,20);
function img_p_class_content_filter($content) {
    // assuming you have created a page/post entitled 'debug'
    $content = preg_replace("/(<p[^>]*)(\>.*)(\<img.*)(<\/p>)/im", "\$1 class='clear'\$2\$3\$4", $content);

    return $content;
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {

	// loop
	foreach( $items as &$item ) {

		// vars
		$icon = get_field('menu_img', $item);
		$title = $item->title;

		// append icon
		if( $icon ) {
			$item->title = wp_get_attachment_image( $icon, "full", false, array("class" => "menu-icon") ) . '<span class="menu-icon-title">' .$title. '</span>';

		}

	}


	// return
	return $items;

}
