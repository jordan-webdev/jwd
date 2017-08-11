<?php
// Brands Custom Post Type
 function register_Brands()
 {
     $labels = array(
 'name' => __('Brands'),
 'singular_name' => __('Brands'),
 'all_items' => __('All Brands'),
 'add_new' => __('Add New Brands'),
 'add_new_item' => __('Add New Brands'),
 'edit_item' => __('Edit Brands'),
 'new_item' => __('New Brands'),
 'view_item' => __('View Brands'),
 'not_found' => __('No Brands found'),
 'not_found_in_trash' => __('No Brands found in Trash'),
 );

     $args = array(
 'label'               => __('Brands'),
 'description'         => __(''),
 'labels'              => $labels,
 'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
 'hierarchical'        => false,
 'public'              => true,
 'show_ui'             => true,
 'show_in_menu'        => true,
 'show_in_nav_menus'   => true,
 'show_in_admin_bar'   => true,
 'can_export'          => true,
 'has_archive'         => true,
 'exclude_from_search' => false,
 'publicly_queryable'  => true,
 'capability_type'     => 'page',
 'menu_icon'           => 'dashicons-networking',

 // This is where we add taxonomies to our CPT
 'taxonomies'          => array( 'category' ),
 );

     register_post_type('brands', $args);
 }

 add_action('init', 'register_brands', 0);

// News & Specials Custom Post Type
function register_blog_posts_cpt()
{
    $labels = array(
    'name' => __('Blog Posts'),
    'singular_name' => __('Blog Post'),
    'all_items' => __('All Blog Posts'),
    'add_new' => __('Add new Blog Post'),
    'add_new_item' => __('Add new Blog Post'),
    'edit_item' => __('Edit Blog Post'),
    'new_item' => __('New Blog Post'),
    'view_item' => __('View Blog Post'),
    'not_found' => __('No Blog Posts found'),
    'not_found_in_trash' => __('No Blog Posts found in Trash'),
);

    $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'comments',
    'custom-fields',
    'revisions',
    'page-attributes',
    'post-formats',
);

    $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queriable' => true,  // you should be able to query it
    'capability_type'     => 'page',
    'show_ui' => true,  // you should be able to edit it in wp-admin
    'exclude_from_search' => false,  // you should exclude it from search results
    'show_in_nav_menus' => true,  // you shouldn't be able to add it to menus
    'has_archive' => false,  // it shouldn't have archive page
    'supports' => $supports,
    'menu_icon' => 'dashicons-welcome-write-blog',
    //'taxonomies' => array( 'category' ),
);
    register_post_type('blog_posts', $args);
}
add_action('init', 'register_blog_posts_cpt', 0);

// FAQ Custom Post Type
function cptui_register_my_cpts_faq()
{
    $labels = array(
        "name" => __('FAQs', 'jwd'),
        "singular_name" => __('FAQ', 'jwd'),
        );

    $args = array(
        "label" => __('FAQs', 'jwd'),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
                "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "faq", "with_front" => true ),
        "query_var" => true,
        "menu_icon" => "dashicons-format-status",
        "supports" => array( "title", "editor", "thumbnail" ),
        //"taxonomies" => array( "category" ),
        );
    register_post_type("faq", $args);

// End of cptui_register_my_cpts_faq()
}
add_action('init', 'cptui_register_my_cpts_faq');

// Glossary Term Custom Post Type
 function register_glossary_term() {

 $labels = array(
 'name' => __( 'Glossary Terms'),
 'singular_name' => __( 'Glossary Term'),
 'all_items' => __( 'All Glossary Terms'),
 'add_new' => __( 'Add New Glossary Term'),
 'add_new_item' => __( 'Add New Glossary Term'),
 'edit_item' => __( 'Edit Glossary Term'),
 'new_item' => __( 'New Glossary Term'),
 'view_item' => __( 'View Glossary Term'),
 'not_found' => __( 'No Glossary Terms found'),
 'not_found_in_trash' => __( 'No Glossary Terms found in Trash'),
 );

 $args = array(
 'label'               => __( 'Glossary Terms' ),
 'description'         => __( ''),
 'labels'              => $labels,
 'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
 'hierarchical'        => false,
 'public'              => true,
 'show_ui'             => true,
 'show_in_menu'        => true,
 'show_in_nav_menus'   => true,
 'show_in_admin_bar'   => true,
 'can_export'          => true,
 'has_archive'         => true,
 'exclude_from_search' => false,
 'publicly_queryable'  => true,
 'capability_type'     => 'page',
 'menu_icon'           => 'dashicons-editor-help',
 // This is where we add taxonomies to our CPT
 'taxonomies'          => array( 'glossary_category' ),
 );

 register_post_type( 'glossary_term', $args );

 }

 add_action( 'init', 'register_glossary_term', 0 );

 // Staff Custom Post Type
  function register_staff() {

  $labels = array(
  'name' => __( 'Staff'),
  'singular_name' => __( 'Staff'),
  'all_items' => __( 'All staff'),
  'add_new' => __( 'Add New Staff'),
  'add_new_item' => __( 'Add New Staff'),
  'edit_item' => __( 'Edit Staff'),
  'new_item' => __( 'New Staff'),
  'view_item' => __( 'View Staff'),
  'not_found' => __( 'No staff found'),
  'not_found_in_trash' => __( 'No staff found in Trash'),
  );

  $args = array(
  'label'               => __( 'Staff' ),
  'description'         => __( ''),
  'labels'              => $labels,
  'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
  'hierarchical'        => false,
  'public'              => true,
  'show_ui'             => true,
  'show_in_menu'        => true,
  'show_in_nav_menus'   => true,
  'show_in_admin_bar'   => true,
  'can_export'          => true,
  'has_archive'         => false,
  'exclude_from_search' => false,
  'publicly_queryable'  => true,
  'capability_type'     => 'page',
  'menu_icon'           => 'dashicons-admin-users',
  );

  register_post_type( 'staff', $args );

  }

  add_action( 'init', 'register_staff', 0 );

  // Career Custom Post Type
   function register_career() {

   $labels = array(
   'name' => __( 'Careers'),
   'singular_name' => __( 'Career'),
   'all_items' => __( 'All Careers'),
   'add_new' => __( 'Add New Career'),
   'add_new_item' => __( 'Add New Career'),
   'edit_item' => __( 'Edit Career'),
   'new_item' => __( 'New Career'),
   'view_item' => __( 'View Career'),
   'not_found' => __( 'No Careers found'),
   'not_found_in_trash' => __( 'No Careers found in Trash'),
   );

   $args = array(
   'label'               => __( 'Careers' ),
   'description'         => __( ''),
   'labels'              => $labels,
   'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
   'hierarchical'        => false,
   'public'              => true,
   'show_ui'             => true,
   'show_in_menu'        => true,
   'show_in_nav_menus'   => true,
   'show_in_admin_bar'   => true,
   'can_export'          => true,
   'has_archive'         => true,
   'exclude_from_search' => false,
   'publicly_queryable'  => true,
   'capability_type'     => 'page',
   'menu_icon'           => 'dashicons-megaphone',
   );

   register_post_type( 'career', $args );

   }

   add_action( 'init', 'register_career', 0 );
