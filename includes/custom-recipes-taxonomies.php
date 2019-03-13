<?php
// Register Taxonomy Food
// Taxonomy Key: food
function create_food_tax() {

	$labels = array(
		'name'              => _x( 'Food', 'taxonomy general name', 'custom-recipes' ),
		'singular_name'     => _x( 'Food', 'taxonomy singular name', 'custom-recipes' ),
		'search_items'      => __( 'Search Food', 'custom-recipes' ),
		'all_items'         => __( 'All Food', 'custom-recipes' ),
		'parent_item'       => __( 'Parent Food', 'custom-recipes' ),
		'parent_item_colon' => __( 'Parent Food:', 'custom-recipes' ),
		'edit_item'         => __( 'Edit Food', 'custom-recipes' ),
		'update_item'       => __( 'Update Food', 'custom-recipes' ),
		'add_new_item'      => __( 'Add New Food', 'custom-recipes' ),
		'new_item_name'     => __( 'New Food Name', 'custom-recipes' ),
		'menu_name'         => __( 'Food', 'custom-recipes' ),
	);
	$rewrite = array(
		'slug' => 'food',
		'with_front' => true,
		'hierarchical' => false,
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Recipe food taxonomy', 'custom-recipes' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
		'rest_base' => 'rest-food-tax',
		'rest_controller_class' => 'WP_REST_Food_Controller',
		'rewrite' => $rewrite,
	);
	register_taxonomy( 'food', array('recipe'), $args );

}
add_action( 'init', 'create_food_tax' );

// Register Taxonomy Cook
// Taxonomy Key: cook

function create_cook_tax() {

	$labels = array(
		'name'              => _x( 'Cooking', 'taxonomy general name', 'custom-recipes' ),
		'singular_name'     => _x( 'Cook', 'taxonomy singular name', 'custom-recipes' ),
		'search_items'      => __( 'Search Cooking', 'custom-recipes' ),
		'all_items'         => __( 'All Cooking', 'custom-recipes' ),
		'parent_item'       => __( 'Parent Cook', 'custom-recipes' ),
		'parent_item_colon' => __( 'Parent Cook:', 'custom-recipes' ),
		'edit_item'         => __( 'Edit Cook', 'custom-recipes' ),
		'update_item'       => __( 'Update Cook', 'custom-recipes' ),
		'add_new_item'      => __( 'Add New Cook', 'custom-recipes' ),
		'new_item_name'     => __( 'New Cook Name', 'custom-recipes' ),
		'menu_name'         => __( 'Cook', 'custom-recipes' ),
	);
	$rewrite = array(
		'slug' => 'cooking',
		'with_front' => true,
		'hierarchical' => false,
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Recipe cooking taxonomy', 'custom-recipes' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
		'rest_base' => 'rest-cooking-tax',
		'rest_controller_class' => 'WP_REST_Cooking_Controller',
		'rewrite' => $rewrite,
	);
	register_taxonomy( 'cook', array('recipe'), $args );

}
add_action( 'init', 'create_cook_tax' );