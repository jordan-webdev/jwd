<?php
/**
 * jwd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jwd
 */

if (! function_exists('jwd_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jwd_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on jwd, use a find and replace
     * to change 'jwd' to the name of your theme in all the template files.
     */
    load_theme_textdomain('jwd', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'jwd'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('jwd_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
}
endif;
add_action('after_setup_theme', 'jwd_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jwd_content_width()
{
    $GLOBALS['content_width'] = apply_filters('jwd_content_width', 640);
}
add_action('after_setup_theme', 'jwd_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function jwd_scripts()
{
    wp_enqueue_style('jwd-style', get_stylesheet_uri());
    
    /* ****** ASSETS ****** */

    // Owl Carousel 2.2.1
    //wp_enqueue_script('jwd-owl-js', get_template_directory_uri() . '/inc/owl-carousel-2.2.1/owl.carousel.min.js', array('jquery'), '', true);

    // Slick Slider 1.6.0
    //wp_enqueue_script('jwd-slick-js', get_template_directory_uri() . '/inc/slick-1.6.0/slick.min.js', array('jquery'), '', true);

    // Fancybox
    //wp_enqueue_script('jwd-fancybox-js', get_template_directory_uri() . '/inc/fancybox-3.0/jquery.fancybox.min.js', array('jquery'), '', true);

    // Font Awesome
    wp_enqueue_script('jwd-font-awesome', 'https://use.fontawesome.com/1562b4b0a4.js');

    wp_enqueue_script('jwd-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    // JS Cookie
    //wp_enqueue_script('jwd-js-cookie-js', get_template_directory_uri() . '/js/js-cookie.js', array(), '', true);

    /* ****** Non-Asset JS ****** */
    
    // Functions
    wp_enqueue_script('jwd-functions-js', get_template_directory_uri() . '/js/functions.js', array('jquery'), '', true);
    
    // Main js
    wp_enqueue_script('jwd-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
    
    // Drop Down
    wp_enqueue_script('jwd-drop-down-js', get_template_directory_uri() . '/js/drop-down.js', array('jquery'), '', true); 
    
    // Side Slider
    wp_register_script('jwd-side-slider-js', get_template_directory_uri() . '/js/side-slider.js', array('jquery'), '', true);
    // Variables to script
    $handle = 'jwd-side-slider-js';
    $name = 'localizedVar';
    $data = array(
        'templateDirectory' => get_template_directory_uri(),
        'homeURL' => home_url(),
        'headerImage' => get_header_image(),
        'blogTitle' => get_bloginfo('title'),
    );
    wp_localize_script($handle, $name, $data);
    
    // Scroll
    wp_enqueue_script('jwd-scroll-js', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '', true);

}
add_action('wp_enqueue_scripts', 'jwd_scripts');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require get_template_directory() .'/inc/widgets.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

/** 
 * Extra files not included in underscores.
 */

// ACF functions
require $template . '/inc/functions/ACF-functions.php';

//Custom Post Types
require get_template_directory() . '/inc/functions/custom_post_types.php';

//Shortcodes
require $template . '/inc/functions/shortcodes.php';

//Taxonomies
require get_template_directory() . '/inc/functions/taxonomies.php';

//Remove wp admin bar
add_filter('show_admin_bar', '__return_false');

