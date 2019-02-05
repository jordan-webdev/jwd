<?php

// Add the "faq_category" taxonomy
function create_faq_category_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'FAQ Category', 'taxonomy general name' ),
    'singular_name' => _x( 'FAQ Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search FAQ Categories' ),
    'all_items' => __( 'All FAQ Categories' ),
    'parent_item' => __( 'Parent FAQ Category' ),
    'parent_item_colon' => __( 'Parent FAQ Category:' ),
    'edit_item' => __( 'Edit FAQ Category' ),
    'update_item' => __( 'Update FAQ Category' ),
    'add_new_item' => __( 'Add New FAQ Category' ),
    'new_item_name' => __( 'New FAQ Category Name' ),
    'menu_name' => __( 'FAQ Categories' ),
  );

  register_taxonomy(
    'faq_category',
    'faq',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
    ));

}
add_action( 'init', 'create_faq_category_hierarchical_taxonomy', 0 );




// Add the "Glossary Category" taxonomy
function create_glossary_category_taxonomy() {

  $labels = array(
    'name' => _x( 'Glossary Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Glossary Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Glossary Categories' ),
    'all_items' => __( 'All Glossary Categories' ),
    'parent_item' => __( 'Parent Glossary Category' ),
    'parent_item_colon' => __( 'Parent Glossary Category:' ),
    'edit_item' => __( 'Edit Glossary Category' ),
    'update_item' => __( 'Update Glossary Category' ),
    'add_new_item' => __( 'Add New Glossary Category' ),
    'new_item_name' => __( 'New Glossary Category Name' ),
    'menu_name' => __( 'Glossary Categories' ),
  );

  register_taxonomy(
    'glossary_category',
    'glossary',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
    ));

}
add_action( 'init', 'create_glossary_category_taxonomy', 0 );




// Add the "Blog Category" taxonomy
function create_blog_category_taxonomy() {

  $labels = array(
    'name' => _x( 'Blog Category', 'taxonomy general name' ),
    'singular_name' => _x( 'Blog Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Blog Categories' ),
    'all_items' => __( 'All Blog Categories' ),
    'parent_item' => __( 'Parent Blog Category' ),
    'parent_item_colon' => __( 'Parent Blog Category:' ),
    'edit_item' => __( 'Edit Blog Category' ),
    'update_item' => __( 'Update Blog Category' ),
    'add_new_item' => __( 'Add New Blog Category' ),
    'new_item_name' => __( 'New Blog Category Name' ),
    'menu_name' => __( 'Blog Categories' ),
  );

  register_taxonomy(
    'blog_category',
    'blog_post',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      // Enable Gutenberg
      "show_in_rest" => true,
    ));

}
add_action( 'init', 'create_blog_category_taxonomy', 0 );
