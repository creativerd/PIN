<?php

/*** SETUP ***/
function PIN_setup() {

	// Possible need for languages other than English?
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 316, 176, true );
	add_image_size( 'PIN-full-width', 960, 540, true );

}
add_action( 'after_setup_theme', 'PIN_setup' );


/*** LOAD SCRIPTS AND STYLE ***/
function PIN_scripts() {

	// Load stylesheets
	wp_enqueue_style( 'PIN-style', get_stylesheet_uri(), array(), null);
	wp_enqueue_style( 'PIN-foundation', get_template_directory_uri() . '/library/css/foundation.css', array(), null);
	wp_enqueue_style( 'PIN-normalize', get_template_directory_uri() . '/library/css/normalize.css', array(), null);

	// Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style', 'genericons' ), '20131205' );
	// wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'PIN-modernizer', get_template_directory_uri() . '/library/js/modernizr.js', array(), '1.0', true );
	wp_enqueue_script( 'PIN-foundation', get_template_directory_uri() . '/library/js/foundation.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'PIN-script', get_template_directory_uri() . '/library/js/PIN.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'PIN_scripts' );


/*** REMOVE ADIN BAR ***/
add_filter('show_admin_bar', '__return_false');


/*** CUSTOM POSTS ***/
require_once('post-types.php');


/*** SPLIT TEXT IN COLUMNS ***/
function spilt_text($text, $column_number) {
	$middle = strrpos(substr($text, 0, floor(strlen($text) / 2)), ' ') + 1;
	$col1 = substr($text, 0, $middle);
	$col2 = substr($text, $middle);

	if($column_number == 1) {
		return $col1;
	} else {
		return $col2;
	}
}


?>