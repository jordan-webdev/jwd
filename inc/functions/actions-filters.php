<?php

/* ******************************************************************
   *
   * redirect_to_account
   * Redirect to Account Page after logging in or registering
   *
   ******************************************************************
*/
//add_action('template_redirect', 'redirect_to_account' );
function redirect_to_account(){
  // Redirect from Login page to Account Page
  if(is_page(131) && is_user_logged_in()){
    $account_url = get_permalink(82);
    wp_redirect($account_url);
    exit;
  }

  // Redirect from Account Page to Login Page
  $allow_access = array_key_exists('allow_access', $_GET) || array_key_exists('show-reset-form', $_GET) ? true : false;
  if(is_page(82) && !is_user_logged_in() && !$allow_access){
    $login_url = get_permalink(131);
    wp_redirect($login_url);
    exit;
  }
};




/* ******************************************************************
   *
   * img_p_class_content_filter
   * Remove <p> tags wrapping <img> in the_content()
   *
   ******************************************************************
*/
//add_filter( 'the_content', 'img_p_class_content_filter' ,20);
function img_p_class_content_filter($content) {
    // assuming you have created a page/post entitled 'debug'
    $content = preg_replace("/(<p[^>]*)(\>.*)(\<img.*)(<\/p>)/im", "\$1 class='clear'\$2\$3\$4", $content);

    return $content;
}




/* ******************************************************************
   *
   * modify_query_with_filters
   * Use pre_get_posts to modify the category query, based on filters
   *
   ******************************************************************
*/

function modify_query_with_filters($query){

  $filters = array(
      "p_brand" => "brand",
      "type" => "types",
      "sheen" => "sheen",
      "eco" => "eco_friendly",
  );

  $chosen_filters = array();

  foreach ($filters as $post_key => $meta_key) {
    if ( array_key_exists($post_key, $_POST) ){
      $chosen_filters[$post_key] = $meta_key;
    }
  }

  if ( !is_admin() && $query->is_main_query() && $chosen_filters ) {

    $meta_query = array();

    foreach ($chosen_filters as $post_key => $meta_key) {

      $meta_value = $_POST[$post_key];

      if ($meta_value && $meta_value != ""){

        if ($meta_key == "types"){
          // The meta value is an array, so use LIKE to search for it
          array_push($meta_query, array(
            'key' => $meta_key,
            'value' => $_POST[$post_key],
            'compare' => 'LIKE'
          ));
        } else{
          array_push($meta_query, array(
            'key' => $meta_key,
            'value' => $_POST[$post_key],
          ));
        }

      }
    }
    $query->set('meta_query', $meta_query);
  }
}
//add_action("pre_get_posts", "modify_query_with_filters");




/* ******************************************************************
   *
   * wp_nav_menu_objects
   * Add custom fields to menu items
   *
   ******************************************************************
*/
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




/* ******************************************************************
   *
   * woocommerce_enqueue_styles
   * Remove WooCommerce styles
   *
   ******************************************************************
*/
add_filter( 'woocommerce_enqueue_styles', 'jwd_dequeue_wc_styles' );
function jwd_dequeue_wc_styles( $enqueue_styles ) {
  if (!is_cart() && !is_checkout() && !is_account_page() && !is_singular("product")){
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
  	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
  	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
  }
  return $enqueue_styles;
}
