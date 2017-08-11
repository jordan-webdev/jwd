<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jwd
 */

$template = get_template_directory_uri();
$images = $template . '/images';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'jwd'); ?></a>

	<div class="padding-site color-grey--bg">
		<header id="masthead" class="site-header container-site flex">

			<!-- Logo -->
			<?php if (is_front_page()): ?>
			  <h1 class="desktop-logo">
			<?php endif; ?>
			  <a href="<?php echo get_home_url(); ?>" rel="home" class="block pad-t-15 pad-b-15">
			    <img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo( "title" ); ?>">
			    <span class="screen-reader-text"><?php bloginfo( "name" ); ?></span>
			  </a>
			<?php if (is_front_page()): ?>
			  </h1>
			<?php endif; ?>

			<?php get_template_part('template-parts/header/part', 'top-bar'); ?>

	    <?php get_template_part('template-parts/header/part', 'nav-desktop'); ?>
			<?php get_template_part('template-parts/header/part', 'header-mobile'); ?>

		</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
