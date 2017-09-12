<?php

// FAQ Custom Post Type
 function register_faq() {

 $labels = array(
 'name' => __( 'FAQ'),
 'singular_name' => __( 'FAQ'),
 'all_items' => __( 'All FAQ'),
 'add_new' => __( 'Add New FAQ'),
 'add_new_item' => __( 'Add New FAQ'),
 'edit_item' => __( 'Edit FAQ'),
 'new_item' => __( 'New FAQ'),
 'view_item' => __( 'View FAQ'),
 'not_found' => __( 'No FAQ '),
 'not_found_in_trash' => __( 'No FAQ found in Trash'),
 );

 $args = array(
 'label'               => __( 'FAQ' ),
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
 'taxonomies'          => array( 'faq_category' ),
 );

 register_post_type( 'faq', $args );

 }

 add_action( 'init', 'register_faq', 0 );

 // Blog Custom Post Type
function register_blog_posts()
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
add_action('init', 'register_blog_posts', 0);
