<?php

// HOMEPAGE
add_action( 'init', 'create_PIN_home' );
function create_PIN_home() {
	$labels = array(
		'name'               => 'Homepage', 'post type general name', 'your-plugin-textdomain',
		'singular_name'      => 'Homepage', 'post type singular name', 'your-plugin-textdomain',
		'menu_name'          => 'Homepage', 'admin menu', 'your-plugin-textdomain',
		'name_admin_bar'     => 'Homepage', 'add new on admin bar', 'your-plugin-textdomain',
		'add_new'            => '', 'home', 'your-plugin-textdomain',
		'add_new_item'       => 'Add New Homepage', 'your-plugin-textdomain',
		'new_item'           => 'New Homepage', 'your-plugin-textdomain',
		'edit_item'          => 'Edit Homepage', 'your-plugin-textdomain',
		'view_item'          => 'View Homepage', 'your-plugin-textdomain',
		'all_items'          => 'Homepage', 'your-plugin-textdomain',
		'search_items'       => 'Search Homepage', 'your-plugin-textdomain',
		'parent_item_colon'  => 'Parent Homepage:', 'your-plugin-textdomain',
		'not_found'          => 'No Homepage found.', 'your-plugin-textdomain',
		'not_found_in_trash' => 'No Homepage found in Trash.', 'your-plugin-textdomain'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'homepage' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'pin_home', $args );
}


// ABOUT PAGE
add_action( 'init', 'create_PIN_about' );
function create_PIN_about() {
	$labels = array(
		'name'               => 'About', 'post type general name', 'your-plugin-textdomain',
		'singular_name'      => 'About', 'post type singular name', 'your-plugin-textdomain',
		'menu_name'          => 'About', 'admin menu', 'your-plugin-textdomain',
		'name_admin_bar'     => 'About', 'add new on admin bar', 'your-plugin-textdomain',
		'add_new'            => '', 'about', 'your-plugin-textdomain',
		'add_new_item'       => 'Add New About', 'your-plugin-textdomain',
		'new_item'           => 'New About', 'your-plugin-textdomain',
		'edit_item'          => 'Edit About', 'your-plugin-textdomain',
		'view_item'          => 'View About', 'your-plugin-textdomain',
		'all_items'          => 'About', 'your-plugin-textdomain',
		'search_items'       => 'Search About', 'your-plugin-textdomain',
		'parent_item_colon'  => 'Parent About:', 'your-plugin-textdomain',
		'not_found'          => 'No About found.', 'your-plugin-textdomain',
		'not_found_in_trash' => 'No About found in Trash.', 'your-plugin-textdomain'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'about' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'pin_about', $args );
}


// PROJECTS PAGE
add_action( 'init', 'create_PIN_projects' );
function create_PIN_projects() {
	$labels = array(
		'name'               => 'Projects', 
		'singular_name'      => 'Projects', 
		'name_admin_bar'     => 'Projects', 
		'add_new'            => 'Add New Project',
		'add_new_item'       => 'Add New Project', 
		'new_item'           => 'New Projects',
		'edit_item'          => 'Edit Projects',
		'view_item'          => 'View Projects',
		'all_items'          => 'All Projects',
		'search_items'       => 'Search Projects',
		'parent_item_colon'  => '', 
		'taxonomies'         => array('project-type'),
		'menu_name'          => 'Projects', 
		'not_found'          => 'No Projects found.',
		'not_found_in_trash' => 'No Projects found in Trash.',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'pin_projects', $args );
}

// PROJECTS TAXONOMIES
function create_project_taxonomies() {

		$labels = array(
		'name'              => 'Projects Types', 'taxonomy general name',
		'singular_name'     => 'Projects Type', 'taxonomy singular name',
		'search_items'      => 'Search Projects Types',
		'all_items'         => 'All Projects Types',
		'parent_item'       => 'Parent Projects Type',
		'parent_item_colon' => 'Parent Projects Type:',
		'edit_item'         => 'Edit Projects Type',
		'update_item'       => 'Update Project Type',
		'add_new_item'      => 'Add New Project Type',
		'new_item_name'     => 'New Projects Types Name',
		'menu_name'         => 'Projects Types'
	);

	$args = array(
		'hierarchical'      		=> true,
		'labels'            		=> $labels,
		'show_ui'           		=> true,
		'show_admin_column' 		=> true,
		'query_var'         		=> true,
     'show_in_nav_menus' 		=> true,
     'sort'              		=> true,
		'rewrite'           		=> array( 'slug' => 'project-type' )
	);
	register_taxonomy( 'project-type', array( 'pin_projects' ), $args );
}
add_action( 'init', 'create_project_taxonomies', 0 );


// CONTACT PAGE
add_action( 'init', 'create_PIN_contact' );
function create_PIN_contact() {
	$labels = array(
		'name'               => 'Contact', 'post type general name', 'your-plugin-textdomain',
		'singular_name'      => 'Contact', 'post type singular name', 'your-plugin-textdomain',
		'menu_name'          => 'Contact', 'admin menu', 'your-plugin-textdomain',
		'name_admin_bar'     => 'Contact', 'add new on admin bar', 'your-plugin-textdomain',
		'add_new'            => '', 'contact', 'your-plugin-textdomain',
		'add_new_item'       => 'Add New Contact', 'your-plugin-textdomain',
		'new_item'           => 'New Contact', 'your-plugin-textdomain',
		'edit_item'          => 'Edit Contact', 'your-plugin-textdomain',
		'view_item'          => 'View Contact', 'your-plugin-textdomain',
		'all_items'          => 'Contact', 'your-plugin-textdomain',
		'search_items'       => 'Search Contact', 'your-plugin-textdomain',
		'parent_item_colon'  => 'Parent Contact:', 'your-plugin-textdomain',
		'not_found'          => 'No Contact found.', 'your-plugin-textdomain',
		'not_found_in_trash' => 'No Contact found in Trash.', 'your-plugin-textdomain'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'contact' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title' )
	);

	register_post_type( 'pin_contact', $args );
}


?>