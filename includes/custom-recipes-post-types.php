<?php
// Register Custom Post Type Recipe
// Post Type Key: recipe
function create_recipe_cpt() {

	$labels = array(
		'name' => _x( 'Recipes', 'Post Type General Name', 'custom-recipes' ),
		'singular_name' => _x( 'Recipe', 'Post Type Singular Name', 'custom-recipes' ),
		'menu_name' => _x( 'Recipes', 'Admin Menu text', 'custom-recipes' ),
		'name_admin_bar' => _x( 'Recipe', 'Add New on Toolbar', 'custom-recipes' ),
		'archives' => __( 'Recipe Archives', 'custom-recipes' ),
		'attributes' => __( 'Recipe Attributes', 'custom-recipes' ),
		'parent_item_colon' => __( 'Parent Recipe:', 'custom-recipes' ),
		'all_items' => __( 'All Recipes', 'custom-recipes' ),
		'add_new_item' => __( 'Add New Recipe', 'custom-recipes' ),
		'add_new' => __( 'Add New', 'custom-recipes' ),
		'new_item' => __( 'New Recipe', 'custom-recipes' ),
		'edit_item' => __( 'Edit Recipe', 'custom-recipes' ),
		'update_item' => __( 'Update Recipe', 'custom-recipes' ),
		'view_item' => __( 'View Recipe', 'custom-recipes' ),
		'view_items' => __( 'View Recipes', 'custom-recipes' ),
		'search_items' => __( 'Search Recipe', 'custom-recipes' ),
		'not_found' => __( 'Not found', 'custom-recipes' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'custom-recipes' ),
		'featured_image' => __( 'Featured Image', 'custom-recipes' ),
		'set_featured_image' => __( 'Set featured image', 'custom-recipes' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom-recipes' ),
		'use_featured_image' => __( 'Use as featured image', 'custom-recipes' ),
		'insert_into_item' => __( 'Insert into Recipe', 'custom-recipes' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'custom-recipes' ),
		'items_list' => __( 'Recipes list', 'custom-recipes' ),
		'items_list_navigation' => __( 'Recipes list navigation', 'custom-recipes' ),
		'filter_items_list' => __( 'Filter Recipes list', 'custom-recipes' ),
	);
	$rewrite = array(
		'slug' => 'recipe',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Recipe', 'custom-recipes' ),
		'description' => __( 'Recipe custom post type', 'custom-recipes' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-buddicons-community',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'post-formats', 'custom-fields'),
		'taxonomies' => array('food', 'cook'),
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
		'rest_base' => 'rest-recipes',
		'rest_controller_class' => 'WP_REST_Recipes_Controller',
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => $rewrite,
	);
	register_post_type( 'recipe', $args );

}
add_action( 'init', 'create_recipe_cpt', 0 );