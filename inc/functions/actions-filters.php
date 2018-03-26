<?php

// Redirect to Account Page after logging in or registering
//add_action('template_redirect', 'redirect_to_account' );
function redirect_to_account(){
  $login_page_id = get_field("login_page", "options");
  $current_page_id = get_the_ID();
  // Redirect from Login page to Account Page
  if($login_page_id == $current_page_id && is_user_logged_in()){
    $account_url = get_permalink( get_option('woocommerce_myaccount_page_id') );
    wp_redirect($account_url);
    exit;
  }

  // Redirect from Account Page to Login Page
  if(is_account_page() && !is_user_logged_in()){
    wp_redirect(get_permalink($login_page_id));
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
add_filter( 'woocommerce_enqueue_styles', 'jwd_dequeue_wc_styles' );
function jwd_dequeue_wc_styles( $enqueue_styles ) {
  if (!is_cart() && !is_checkout() && !is_account_page() && !is_singular("product")){
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
  	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
  	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
  }
  return $enqueue_styles;
}

