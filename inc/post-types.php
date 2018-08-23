<?php
/*
* Custom Post Types
*/

/*
* Proyectos CPT
*/
// Register Custom Post Type Project
// Post Type Key: project
function create_project_cpt() {

	$labels = array(
		'name' => __( 'Projects', 'Post Type General Name', 'kat-project' ),
		'singular_name' => __( 'Project', 'Post Type Singular Name', 'kat-project' ),
		'menu_name' => __( 'Projects', 'kat-project' ),
		'name_admin_bar' => __( 'Project', 'kat-project' ),
		'archives' => __( 'Project Archives', 'kat-project' ),
		'attributes' => __( 'Project Attributes', 'kat-project' ),
		'parent_item_colon' => __( 'Parent Project:', 'kat-project' ),
		'all_items' => __( 'All Projects', 'kat-project' ),
		'add_new_item' => __( 'Add New Project', 'kat-project' ),
		'add_new' => __( 'Add New', 'kat-project' ),
		'new_item' => __( 'New Project', 'kat-project' ),
		'edit_item' => __( 'Edit Project', 'kat-project' ),
		'update_item' => __( 'Update Project', 'kat-project' ),
		'view_item' => __( 'View Project', 'kat-project' ),
		'view_items' => __( 'View Projects', 'kat-project' ),
		'search_items' => __( 'Search Project', 'kat-project' ),
		'not_found' => __( 'Not found', 'kat-project' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'kat-project' ),
		'featured_image' => __( 'Featured Image', 'kat-project' ),
		'set_featured_image' => __( 'Set featured image', 'kat-project' ),
		'remove_featured_image' => __( 'Remove featured image', 'kat-project' ),
		'use_featured_image' => __( 'Use as featured image', 'kat-project' ),
		'insert_into_item' => __( 'Insert into Project', 'kat-project' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'kat-project' ),
		'items_list' => __( 'Projects list', 'kat-project' ),
		'items_list_navigation' => __( 'Projects list navigation', 'kat-project' ),
		'filter_items_list' => __( 'Filter Projects list', 'kat-project' ),
	);
	$args = array(
		'label' => __( 'Project', 'kat-project' ),
		'description' => __( 'work projects in development', 'kat-project' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-lightbulb',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'create_project_cpt', 0 );

// Register Custom Post Type Web Tool
// Post Type Key: webtool
function create_webtool_cpt() {

	$labels = array(
		'name' => __( 'Web Tools', 'Post Type General Name', 'kat-tools' ),
		'singular_name' => __( 'Web Tool', 'Post Type Singular Name', 'kat-tools' ),
		'menu_name' => __( 'Web Tools', 'kat-tools' ),
		'name_admin_bar' => __( 'Web Tool', 'kat-tools' ),
		'archives' => __( 'Web Tool Archives', 'kat-tools' ),
		'attributes' => __( 'Web Tool Attributes', 'kat-tools' ),
		'parent_item_colon' => __( 'Parent Web Tool:', 'kat-tools' ),
		'all_items' => __( 'All Web Tools', 'kat-tools' ),
		'add_new_item' => __( 'Add New Web Tool', 'kat-tools' ),
		'add_new' => __( 'Add New', 'kat-tools' ),
		'new_item' => __( 'New Web Tool', 'kat-tools' ),
		'edit_item' => __( 'Edit Web Tool', 'kat-tools' ),
		'update_item' => __( 'Update Web Tool', 'kat-tools' ),
		'view_item' => __( 'View Web Tool', 'kat-tools' ),
		'view_items' => __( 'View Web Tools', 'kat-tools' ),
		'search_items' => __( 'Search Web Tool', 'kat-tools' ),
		'not_found' => __( 'Not found', 'kat-tools' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'kat-tools' ),
		'featured_image' => __( 'Featured Image', 'kat-tools' ),
		'set_featured_image' => __( 'Set featured image', 'kat-tools' ),
		'remove_featured_image' => __( 'Remove featured image', 'kat-tools' ),
		'use_featured_image' => __( 'Use as featured image', 'kat-tools' ),
		'insert_into_item' => __( 'Insert into Web Tool', 'kat-tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Web Tool', 'kat-tools' ),
		'items_list' => __( 'Web Tools list', 'kat-tools' ),
		'items_list_navigation' => __( 'Web Tools list navigation', 'kat-tools' ),
		'filter_items_list' => __( 'Filter Web Tools list', 'kat-tools' ),
	);
	$args = array(
		'label' => __( 'Web Tool', 'kat-tools' ),
		'description' => __( 'Your web tools portfolio', 'kat-tools' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-tools',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'webtool', $args );

}
add_action( 'init', 'create_webtool_cpt', 0 );

 ?>