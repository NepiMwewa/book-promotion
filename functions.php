<?php

//functions
function d_and_d_styles() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script( 'menuToggle', get_template_directory_uri() . '/js/menuToggle.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'd_and_d_styles', 15);


function wpdocs_custom_excerpt_length( $length ) {
	return 55;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function nd_dosth_theme_setup() {

    // Add <title> tag support
    add_theme_support( 'title-tag' );

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

}
add_action( 'after_setup_theme', 'nd_dosth_theme_setup');

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

// nav functions
register_nav_menus(array(
  'primary' => __('Header Menu'),
  'footer' => __('Footer Menu'),
  'privacy' => __('Privacy Menu'),
));


function my_pagination_rewrite() {
  add_rewrite_rule(get_option('category_base').'/page/?([0-9]{1,})/?$', 'index.php?pagename='.get_option('category_base').'&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');

include('custom-shortcodes.php');
