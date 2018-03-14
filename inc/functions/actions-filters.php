<?php

// Redirect to Account Page after logging in or registering
//add_action('template_redirect', 'redirect_to_account' );
function redirect_to_account(){
  // Redirect from Login page to Account Page
  if(is_page(131) && is_user_logged_in()){
    $account_url = get_permalink(82);
    wp_redirect($account_url);
    exit;
  }

  // Redirect from Account Page to Login Page
  //$allow_access = array_key_exists('allow_access', $_GET) ? true : false;
  if(is_page(82) && !is_user_logged_in() && !$allow_access){
    $login_url = get_permalink(131);
    wp_redirect($login_url);
    exit;
  }
};

//add_filter( 'the_content', 'img_p_class_content_filter' ,20);
function img_p_class_content_filter($content) {
    // assuming you have created a page/post entitled 'debug'
    $content = preg_replace("/(<p[^>]*)(\>.*)(\<img.*)(<\/p>)/im", "\$1 class='clear'\$2\$3\$4", $content);

    return $content;
}

//add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
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

// Remove each style one by one
//add_filter( 'woocommerce_enqueue_styles', 'jwd_dequeue_wc_styles' );
function jwd_dequeue_wc_styles( $enqueue_styles ) {
  if (!is_page(array(80, 81, 82)) && !is_singular("product")){
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
  	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
  	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
  }
  return $enqueue_styles;
}
