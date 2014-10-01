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


/*** REMOVE ADMIN BAR ***/
add_filter('show_admin_bar', '__return_false');

/*** REMOVE BACKEND SECTIONS ***/
function remove_menus(){
	remove_menu_page( 'edit.php' );                   //Posts
	//remove_menu_page( 'upload.php' );               //Media
	remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
}

add_action('admin_menu', 'remove_menus');


/*** CUSTOM POSTS ***/
require_once('post-types.php');


/*** SPLIT TEXT IN COLUMNS ***/
function spilt_text($text, $column_number) {
	$text_length = strlen($text);
	$third = $text_length / 3;

	$one_third = strrpos(substr($text, 0, floor($third)), '.') + 1;
	$two_thirds = strrpos(substr($text, $one_third, floor($third * 2)), '.') + 1;
	$three_thirds = strpos(substr($text, $two_thirds ), '.') + 1;
	
	$col1 = substr($text, 0, $one_third);
	$col2 = substr($text, $one_third, ($text_length - $two_thirds));
	$col3 = substr($text, ($two_thirds + $three_thirds));

	if($column_number == 1) {
		return $col1;
	} else if($column_number == 2){
		return $col2;
	} else {
		return $col3;
	}
}

/*** REMOVE EMPTY O TAGS ***/
remove_filter('the_content', 'wpautop');


?>