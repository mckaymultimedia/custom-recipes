<?php
/*
Plugin Name: Custom Recipes
Plugin URI: https://www.mckaymultimedia.com/
Description: Custom Plugin used to modify general aspects of the MckayMultimedia.com plugins, themes, and overall website.
Version: 1.0.0
Author: Nathan McKay
Author URI: https://www.mckaymultimedia.com/
License: GPLv2 or later
Text Domain: custom-quotes
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

Copyright 2018 Nathan McKay
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

// Register javascript and style on initialization
add_action('init', 'custom_recipes_register_script');
function custom_recipes_register_script() {
	wp_register_script( 'custom_recipes_scripts', plugins_url('/js/scripts.js', __FILE__), array('jquery'), '1.0.0' );
	wp_register_style( 'custom_recipes_styles', plugins_url('/css/styles.css', __FILE__), false, '1.0.0', 'all');
}

// Use the registered javascript and style above
add_action('wp_enqueue_scripts', 'custom_recipes_enqueue_style');
function custom_recipes_enqueue_style(){
	wp_enqueue_script( 'custom_recipes_scripts' );
	wp_enqueue_style( 'custom_recipes_styles' );
}

/**
 * Post types registration and parameters.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-post-types.php');
/**
 * Taxonomy registration and parameters.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-taxonomies.php');
/**
 * Post and Taxonomy field registration and parameters.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-fields.php');
/**
 * Image field registration and parameters.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-images.php');
/**
 * Shortcode registration and parameters.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-shortcodes.php');
/**
 * Admin user interface.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/custom-recipes-admin.php');