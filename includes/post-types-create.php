<?php
// Register Custom Post Type
function custom_post_type_subjects() {

	$labels = array(
		'name'                  => _x( 'Subjects', 'Post Type General Name', 'inf-uth' ),
		'singular_name'         => _x( 'Subject', 'Post Type Singular Name', 'inf-uth' ),
		'menu_name'             => __( 'Subjects', 'inf-uth' ),
		'name_admin_bar'        => __( 'Subject', 'inf-uth' ),
		'archives'              => __( 'Subject Archives', 'inf-uth' ),
		'attributes'            => __( 'Subject Attributes', 'inf-uth' ),
		'parent_item_colon'     => __( 'Parent Subject:', 'inf-uth' ),
		'all_items'             => __( 'All Subjects', 'inf-uth' ),
		'add_new_item'          => __( 'Add New Subject', 'inf-uth' ),
		'add_new'               => __( 'Add New', 'inf-uth' ),
		'new_item'              => __( 'New Subject', 'inf-uth' ),
		'edit_item'             => __( 'Edit Subject', 'inf-uth' ),
		'update_item'           => __( 'Update Subject', 'inf-uth' ),
		'view_item'             => __( 'View Subject', 'inf-uth' ),
		'view_items'            => __( 'View Subjects', 'inf-uth' ),
		'search_items'          => __( 'Search Subject', 'inf-uth' ),
		'not_found'             => __( 'Not Subjectfound', 'inf-uth' ),
		'not_found_in_trash'    => __( 'Not Subject found in Trash', 'inf-uth' ),
		'featured_image'        => __( 'Featured Image', 'inf-uth' ),
		'set_featured_image'    => __( 'Set featured image', 'inf-uth' ),
		'remove_featured_image' => __( 'Remove featured image', 'inf-uth' ),
		'use_featured_image'    => __( 'Use as featured image', 'inf-uth' ),
		'insert_into_item'      => __( 'Insert into Subject', 'inf-uth' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Subject', 'inf-uth' ),
		'items_list'            => __( 'Subjects list', 'inf-uth' ),
		'items_list_navigation' => __( 'Subjects list navigation', 'inf-uth' ),
		'filter_items_list'     => __( 'Filter Subjects list', 'inf-uth' ),
	);
	$args = array(
		'label'                 => __( 'Subject', 'inf-uth' ),
		'description'           => __( 'Τα μαθήματα του προγράμματος Σπουδών', 'inf-uth' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'subjects', $args );

}
add_action( 'init', 'custom_post_type_subjects', 0 );

// Register Custom Post Type
function custom_post_type_teachers() {

	$labels = array(
		'name'                  => _x( 'Teachers', 'Post Type General Name', 'inf-uth' ),
		'singular_name'         => _x( 'Teacher', 'Post Type Singular Name', 'inf-uth' ),
		'menu_name'             => __( 'Teachers', 'inf-uth' ),
		'name_admin_bar'        => __( 'Teachers', 'inf-uth' ),
		'archives'              => __( 'Teachers Archives', 'inf-uth' ),
		'attributes'            => __( 'Teachers Attributes', 'inf-uth' ),
		'parent_item_colon'     => __( 'Parent Teachers:', 'inf-uth' ),
		'all_items'             => __( 'All Teachers', 'inf-uth' ),
		'add_new_item'          => __( 'Add New Teacher', 'inf-uth' ),
		'add_new'               => __( 'Add New', 'inf-uth' ),
		'new_item'              => __( 'New Teacher', 'inf-uth' ),
		'edit_item'             => __( 'Edit Teacher', 'inf-uth' ),
		'update_item'           => __( 'Update Teacher', 'inf-uth' ),
		'view_item'             => __( 'View Teacher', 'inf-uth' ),
		'view_items'            => __( 'View Teachers', 'inf-uth' ),
		'search_items'          => __( 'Search Teacher', 'inf-uth' ),
		'not_found'             => __( 'Not found', 'inf-uth' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'inf-uth' ),
		'featured_image'        => __( 'Featured Image', 'inf-uth' ),
		'set_featured_image'    => __( 'Set featured image', 'inf-uth' ),
		'remove_featured_image' => __( 'Remove featured image', 'inf-uth' ),
		'use_featured_image'    => __( 'Use as featured image', 'inf-uth' ),
		'insert_into_item'      => __( 'Insert into Teacher', 'inf-uth' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Teacher', 'inf-uth' ),
		'items_list'            => __( 'Teachers list', 'inf-uth' ),
		'items_list_navigation' => __( 'Teachers list navigation', 'inf-uth' ),
		'filter_items_list'     => __( 'Filter Teachers list', 'inf-uth' ),
	);
	$args = array(
		'label'                 => __( 'Teacher', 'inf-uth' ),
		'description'           => __( 'Uni Teachers', 'inf-uth' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'teachers', $args );

}
add_action( 'init', 'custom_post_type_teachers', 0 );