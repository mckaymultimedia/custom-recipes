<?php 
// Register Attachment Taxonomy
// Taxonomy Key: group
function create_group_tax() {
	
    $labels = array(
		'name'              => _x( 'Groups', 'taxonomy general name', 'custom-recipes' ),
		'singular_name'     => _x( 'Group', 'taxonomy singular name', 'custom-recipes' ),
		'search_items'      => __( 'Search Groups', 'custom-recipes' ),
		'all_items'         => __( 'All Groups', 'custom-recipes' ),
		'parent_item'       => __( 'Parent Group', 'custom-recipes' ),
		'parent_item_colon' => __( 'Parent Group:', 'custom-recipes' ),
		'edit_item'         => __( 'Edit Group', 'custom-recipes' ),
		'update_item'       => __( 'Update Group', 'custom-recipes' ),
		'add_new_item'      => __( 'Add New Group', 'custom-recipes' ),
		'new_item_name'     => __( 'New Group Name', 'custom-recipes' ),
		'menu_name'         => __( 'Group', 'custom-recipes' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
    register_taxonomy( 'group', array('attachment'), $args );
}
add_action( 'init', 'create_group_tax' );



// Use the below to add a field to the images to pull the post slug that the image is associated with and insert that link into the caption in a stylistic way

// add source url to image captions
// --------------------------------
//
// add this to functions.php of your (child) theme
// original by Kaspars Dambis: https://kaspars.net/blog/wordpress/how-to-automatically-add-image-credit-or-source-url-to-photo-captions-in-wordpress 
// modified by Kasper Kamperman: https://www.kasperkamperman.com/blog/source-link-captions-in-wordpress/

add_filter("attachment_fields_to_edit", "add_image_source_url", 10, 2);
function add_image_source_url($form_fields, $post) {
	$form_fields["source_url"] = array(
		"label" => __("Source URL"),
		"input" => "text",
		"value" => get_post_meta($post->ID, "source_url", true),
                "helps" => __("Add the URL where the original image was posted"),
	);
    
    $form_fields["source_credit"] = array(
		"label" => __("Source Credits"),
		"input" => "text",
		"value" => get_post_meta($post->ID, "source_credit", true),
                "helps" => __("If you add credits, those will be linked instead of the whole caption."),
	);
    
 	return $form_fields;
}

add_filter("attachment_fields_to_save", "save_image_source_url", 10 , 2);
function save_image_source_url($post, $attachment) {
	if (isset($attachment['source_url']))
		update_post_meta($post['ID'], 'source_url', trim($attachment['source_url']));
    if (isset($attachment['source_credit']))
		update_post_meta($post['ID'], 'source_credit', trim($attachment['source_credit']));
	return $post;
}

add_filter('img_caption_shortcode', 'caption_shortcode_with_credits', 10, 3);
function caption_shortcode_with_credits($empty, $attr, $content) {
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	// Extract attachment $post->ID
	preg_match('/\d+/', $id, $att_id);
	if (is_numeric($att_id[0]) && $source_url = get_post_meta($att_id[0], 'source_url', true)) {
        
        if($source_credit = get_post_meta($att_id[0], 'source_credit', true)) {
            $caption .= ' &#8211; <a class="source-credit" href="'. $source_url .'">'. $source_credit .'</a>';   
        }
        else {
            $caption = '<a href="'. esc_url ( $source_url ) .'">'. $caption .'</a>';
        }
	}

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) 
		$id = 'id="' . esc_attr($id) . '" ';
    
	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

// end add source url to image captions
// ------------------------------------