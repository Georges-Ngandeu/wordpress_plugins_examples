<?php
/*
  Plugin Name: Hide Menu Item
  Plugin URI:
  Description: Hide items which users should not access from the default menu
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

// Register function to be called when admin menu is constructed
add_action( 'admin_menu', 'hmi_hide_menu_item' );

// Implement function to hide comments menu item and permalink menu item
function hmi_hide_menu_item() {
    remove_menu_page( 'edit-comments.php' );

    remove_submenu_page( 'options-general.php', 'options-permalink.php' );
}