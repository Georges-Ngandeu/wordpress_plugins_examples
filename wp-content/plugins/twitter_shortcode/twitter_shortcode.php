<?php

/*
  Plugin Name: Twitter Shortcode
  Plugin URI: 
  Description: Createa new simple shortcode'
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_shortcode( 'tl', 'twitter_link_shortcode' );

function twitter_link_shortcode( $atts ) {
	$output = '<a href="https://twitter.com/georges">';
	$output .= 'Twitter Feed</a>';
	return $output;
}