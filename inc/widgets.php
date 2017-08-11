<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jwd_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'jwd'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'jwd'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    for ($i = 1; $i <= 9; $i++) {
        register_sidebar(array(
          'name'          => esc_html__('Footer ' .$i, 'jwd'),
          'id'            => 'footer-' .$i,
          'description'   => esc_html__('Add widgets here.', 'jwd'),
          'before_widget' => '',
          'after_widget'  => '',
          'before_title'  => '<h2 class="sitemap__item-title color-primary">',
          'after_title'   => '</h2>',
      ));
    }
}
add_action('widgets_init', 'jwd_widgets_init');
