<?php
/*
  Plugin Name: Multi-Level Menu
  Plugin URI:
  Description: Create a multi-level administration menu
  Author: Georges Ngandeu
  Version: 1.0
  Author URI: https://github.com/Georges-Ngandeu/wordpress_plugins_examples
 */

// Register function to be called when the admin menu is constructed
add_action( 'admin_menu', 'mlm_admin_menu' );

// Add two menu items to the admin menu, with one being a top-level menu item and the other being a sub-menu
function mlm_admin_menu() {
    // Create top-level menu item
    add_menu_page( 'My Complex Plugin Configuration Page',
        'My Complex Plugin', 'manage_options',
        'mlm-main-menu', 'mlm_my_complex_main',
        plugins_url( 'plugin.png', __FILE__ ) );

    // Create a sub-menu under the top-level menu
    add_submenu_page( 'mlm-main-menu',
        'My Complex Menu Sub-Config Page', 'Sub-Config Page',
        'manage_options', 'mlm-sub-menu',
        'mlm_my_complex_submenu' );

    global $submenu;
    $url = 'https://www.packtpub.com/books/info/packt/faq';
    $submenu['mlm-main-menu'][] = array( 'FAQ', 'manage_options', $url );
}