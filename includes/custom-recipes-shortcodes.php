<?php
// Register Custom Post Type Rotator Shortcode
function custom_quotes_random_posts() { 
	$args = array(
		'post_type' => 'quotes',
		'orderby'   => 'rand',
		'posts_per_page' => 1, 
	);
	 
	$the_query = new WP_Query( $args );
	 
	if ( $the_query->have_posts() ) {
	 
		$string .= '<span>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			/* $string .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>'; */ //Only used when returning multiple results. We are returning one post.
			$string .= get_the_content();
		}
		$string .= '</span>';
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
	 
	$string .= 'no posts found';
	}
	 
	return $string; 
} 
add_shortcode('custom-quotes-random-posts','custom_quotes_random_posts');
add_filter('widget_text', 'do_shortcode'); 