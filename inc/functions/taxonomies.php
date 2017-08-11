<?php
// Add the "blog" taxonomy
function create_blog_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Blog Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Blog Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Blog Categories' ),
    'all_items' => __( 'All Blog Categories' ),
    'parent_item' => __( 'Parent Blog Category' ),
    'parent_item_colon' => __( 'Parent Blog Category:' ),
    'edit_item' => __( 'Edit Blog Category' ),
    'update_item' => __( 'Update Blog Category' ),
    'add_new_item' => __( 'Add New Blog Category' ),
    'new_item_name' => __( 'New Blog category Name' ),
    'menu_name' => __( 'Blog Categories' ),
  );

  register_taxonomy(
    'blog',
    'blog_posts',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'blog' ),
    ));

}
add_action( 'init', 'create_blog_hierarchical_taxonomy', 0 );

// Add the "faq" taxonomy
function create_faq_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'FAQ Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'FAQ Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search FAQ Categories' ),
    'all_items' => __( 'All FAQ Categories' ),
    'parent_item' => __( 'Parent FAQ Category' ),
    'parent_item_colon' => __( 'Parent FAQ Category:' ),
    'edit_item' => __( 'Edit FAQ Category' ),
    'update_item' => __( 'Update FAQ Category' ),
    'add_new_item' => __( 'Add New FAQ Category' ),
    'new_item_name' => __( 'New FAQ category Name' ),
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
      'rewrite' => array( 'slug' => 'faqs' ),
    ));

}
add_action( 'init', 'create_faq_hierarchical_taxonomy', 0 );

// Add the "glossary" taxonomy
function create_glossary_hierarchical_taxonomy() {

  $labels = array(
    'name' => _x( 'Glossary Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Glossary Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Glossary Categories' ),
    'all_items' => __( 'All Glossary Categories' ),
    'parent_item' => __( 'Parent Glossary Category' ),
    'parent_item_colon' => __( 'Parent Glossary Category:' ),
    'edit_item' => __( 'Edit Glossary Category' ),
    'update_item' => __( 'Update Glossary Category' ),
    'add_new_item' => __( 'Add New Glossary Category' ),
    'new_item_name' => __( 'New Glossary category Name' ),
    'menu_name' => __( 'Glossary Categories' ),
  );

  register_taxonomy(
    'glossary_category',
    'glossary_term',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'glossary' ),
    ));

}
add_action( 'init', 'create_glossary_hierarchical_taxonomy', 0 );

// Add the "Video" taxonomy
function create_video_taxonomy() {

  $labels = array(
    'name' => _x( 'Video Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Video Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Video Types' ),
    'all_items' => __( 'All Video Types' ),
    'parent_item' => __( 'Parent Video Types' ),
    'parent_item_colon' => __( 'Parent Video Types:' ),
    'edit_item' => __( 'Edit Video Type' ),
    'update_item' => __( 'Update Video Type' ),
    'add_new_item' => __( 'Add New Video Type' ),
    'new_item_name' => __( 'New Video Type Name' ),
    'menu_name' => __( 'Video Types' ),
  );

  register_taxonomy(
    'video',
    'post',
    array(
      'hierarchical' => false,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'video' ),
    ));

}
add_action( 'init', 'create_video_taxonomy', 0 );
