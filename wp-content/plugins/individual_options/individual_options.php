<?php
/*
  Plugin Name: Individual Options
  Plugin URI: 
  Description: Create default user settings on plugin initialization
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */
 
// Register function to be called when plugin is activated
register_activation_hook( __FILE__, 'set_default_options' );

// Function to check if option exist and create a new option if it does not
function set_default_options() {
	if ( get_option( 'ga_account_name' ) === false ) {
		add_option( 'ga_account_name', 'UA-0000000-0' );
	}
}