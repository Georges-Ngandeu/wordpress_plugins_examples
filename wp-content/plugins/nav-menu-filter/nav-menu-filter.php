<?php

/*
  Plugin Name: Nav Menu Filter
  Plugin URI: 
  Description: Troubleshooting coding errors and printing variable contents
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

add_filter( 'wp_nav_menu_objects', 'new_nav_menu_items', 10, 2 );

function new_nav_menu_items( $sorted_menu_items, $args ) {

	// Check if used is logged in, continue if not logged
	if ( is_user_logged_in() == FALSE ) {
		// Loop through all menu items received
		// Place each item's key in $key variable
		foreach ( $sorted_menu_items as $key => $sorted_menu_item ) {
			// Check if menu item title matches search string
			if ( $sorted_menu_item->title == "Private Area" ) {
				// Remove item from menu array if found using
				// item key
				unset( $sorted_menu_items[ $key ] );
			}
		}
	}

	return $sorted_menu_items;
}