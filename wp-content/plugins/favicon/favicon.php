<?php
/*
  Plugin Name: Favicon
  Plugin URI:
  Description: Adding favion
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_action( 'wp_head', 'page_header_favicon' );

function page_header_favicon() {
	$site_icon_url = get_site_icon_url();
	if ( !empty( $site_icon_url ) ) {
		wp_site_icon();
	} else {
		$icon_url = plugins_url( 'favicon.ico', __FILE__ );
?>

    <link rel="shortcut icon" href="<?php echo $icon_url; ?>" />
 <?php  
	}
}


