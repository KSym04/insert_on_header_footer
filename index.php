<?php
/*
Plugin Name: Insert on Header & Footer
Plugin URI: http://www.dopethemes.com/plugins/insert-on-header-footer/
Description: This plugin allows you to add extra script on header and footer.
Version: 1.0.1
Author: DopeThemes
Author URI: http://www.dopethemes.com/
Plugin update URI: insert-on-header-footer
Short Name: insert_on_header_footer
Support URI: http://www.dopethemes.com/contact-us/
*/

// == INSTALLATION == //
/**
 * Set some defaults on after installation
 */
function insert_on_header_footer_call_after_install() {
  osc_set_preference( 'header_code', '', 'plugin-insert_on_header_footer', 'STRING' );
  osc_set_preference( 'footer_code', '', 'plugin-insert_on_header_footer', 'STRING' );
}

/**
 * Delete preferences value after uninstall
 */
function insert_on_header_footer_call_after_uninstall() {
  osc_delete_preference( 'header_code', 'plugin-insert_on_header_footer' );
  osc_delete_preference( 'footer_code', 'plugin-insert_on_header_footer' );
}

/**
 * Save settings
 */
function insert_on_header_footer_actions() {
  if ( Params::getParam( 'file' ) != 'insert_on_header_footer/admin.php' ) {
    return '';
  }

  // Save settings
  if ( Params::getParam( 'option' ) == 'settings_saved' ) {
    // set data
    osc_set_preference( 'header_code', Params::getParam( "header_code", false, false ), 'plugin-insert_on_header_footer', 'STRING' );
    osc_set_preference( 'footer_code', Params::getParam( "footer_code", false, false ), 'plugin-insert_on_header_footer', 'STRING' );

    // return message
    osc_add_flash_ok_message( __( 'Settings saved.', 'insert_on_header_footer' ), 'admin' );
    osc_redirect_to( osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ) );
  }
}
osc_add_hook( 'init_admin', 'insert_on_header_footer_actions' );

/**
 * Admin page
 */
function insert_on_header_footer_admin() {
  osc_admin_render_plugin( 'insert_on_header_footer/admin.php' );
}

/**
 * Include on plugin submenu
 */
function insert_on_header_footer_admin_menu() {
  osc_admin_menu_plugins( 'Insert on Header/Footer', osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ), 'insert_on_header_footer_submenu' );
}

/**
 * Load some style on our admin panel
 */
function insert_on_header_footer_admin_style() {
  osc_enqueue_style( 'insert_on_header_footer-style', osc_plugin_url( __FILE__ ) . 'assets/css/style.css' );
}
osc_add_hook( 'init_admin', 'insert_on_header_footer_admin_style' );

/**
 * Initialize
 */
function insert_on_header_footer_init_head() {
  echo stripslashes( osc_get_preference( 'header_code', 'plugin-insert_on_header_footer' ) );
}
osc_add_hook( 'header', 'insert_on_header_footer_init_head' );

function insert_on_header_footer_init_foot() {
  echo stripslashes( osc_get_preference( 'footer_code', 'plugin-insert_on_header_footer' ) );
}
osc_add_hook( 'footer', 'insert_on_header_footer_init_foot' );


// == HOOKS INSTALLATION AND PLUGIN REGISTRATION == //
osc_register_plugin( osc_plugin_path( __FILE__ ), 'insert_on_header_footer_call_after_install' );
osc_add_hook( osc_plugin_path( __FILE__ )."_uninstall", 'insert_on_header_footer_call_after_uninstall' );
osc_add_hook( osc_plugin_path( __FILE__ )."_configure", 'insert_on_header_footer_admin' );
osc_add_hook( 'admin_menu_init', 'insert_on_header_footer_admin_menu' );
