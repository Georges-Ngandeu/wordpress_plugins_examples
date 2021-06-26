<?php

/*
  Plugin Name: Twitter Embed
  Plugin URI: 
  Description: Create shortcode with parameters
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_shortcode( 'twitterfeed', 'twitter_embed_shortcode' );

function twitter_embed_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'user_name' => 'georges'
    ), $atts ) );
    
	if ( !empty( $user_name ) ) {
		$output = '<a class="twitter-timeline" href="';
		$output .= esc_url( 'https://twitter.com/' . $user_name );
		$output .= '">Tweets by ' . esc_html( $user_name );
		$output .= '</a><script async ';
		$output .= 'src="//platform.twitter.com/widgets.js"';
		$output .= ' charset="utf-8"></script>';
	} else {
		$output = '';
	}
    
    return $output;
}