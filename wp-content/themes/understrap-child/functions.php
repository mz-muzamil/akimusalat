<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{
	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get('Version');

	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	$custom_styles  = "/css/custom.css";
	$responsive_styles  = "/css/responsive.css";

	$css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

	wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);
	wp_enqueue_style("owl-styles", get_stylesheet_directory_uri() . "/lib/OwlCarousel/assets/css/owl.carousel.min.css", array(), $css_version);
	wp_enqueue_style("owl-theme-styles", get_stylesheet_directory_uri() . "/lib/OwlCarousel/assets/css/owl.theme.default.min.css", array(), $css_version);
	wp_enqueue_style("fontawesome-styles", get_stylesheet_directory_uri() . "/lib/fontawesome/css/all.min.css", array(), $css_version);
	wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . $custom_styles, array(), $the_theme->get('Version'));
	wp_enqueue_style('responsive_styles', get_stylesheet_directory_uri() . $responsive_styles, array(), $the_theme->get('Version'));
	wp_enqueue_script('jquery');

	$js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);

	wp_enqueue_script("owl-scripts", get_stylesheet_directory_uri() . "/lib/OwlCarousel/assets/js/owl.carousel.min.js", array(), $js_version, true);
	wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);
	wp_enqueue_script("custom-scripts", get_stylesheet_directory_uri() . "/js/custom.js", array(), $js_version, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_localize_script('custom-scripts', 'redirect_to_checkout', array(
		'checkout_url' => wc_get_checkout_url()
	));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
	load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');

/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version()
{
	return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);

/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array('customize-preview'),
		'20130508',
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');

function allow_empty_cart_checkout()
{
	if (is_checkout() && !is_wc_endpoint_url('order-received')) {
		WC()->cart->add_to_cart(0);
	}
}
add_action('template_redirect', 'allow_empty_cart_checkout');


function user_reviews()
{
	$labels = array(
		'name'               => __('Testimonials'),
		'singular_name'      => __('Testimonial New'),
		'add_new'            => __('Add New Testimonial'),
		'add_new_item'       => __('Add New Testimonial New'),
		'edit_item'          => __('Edit Testimonial New'),
		'new_item'           => __('Add New Testimonial New'),
		'view_item'          => __('View Testimonial New'),
		'search_items'       => __('Search Testimonial New'),
		'not_found'          => __('No Testimonial New found'),
		'not_found_in_trash' => __('No Testimonial New found in trash')
	);
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'comments',
		'revisions',
	);
	$args = array(
		'labels'               => $labels,
		'supports'             => $supports,
		'public'               => true,
		'capability_type'      => 'post',
		'rewrite'              => array('slug' => '', 'testimonials' => false),
		'has_archive'          => true,
		'menu_position'        => null,
		'menu_icon'            => 'dashicons-groups'
	);
	register_post_type('user_reviews', $args);
}
add_action('init', 'user_reviews');
