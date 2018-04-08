<?php
/*
Plugin Name: Insert on Header & Footer
Plugin URI: https://www.dopethemes.com/downloads/insert-header-footer/
Description: This osclass plugin allows you to add an extra styling code or scripts on your site header and footer.
Version: 1.0.2
Author: DopeThemes
Author URI: https://www.dopethemes.com/
Plugin update URI: insert-on-header-footer
Short Name: insert_on_header_footer
Support URI: https://www.dopethemes.com/contact/
*/

if ( ! defined( 'ABS_PATH' ) ) {
	exit;
}

/**
 * insert_on_header_footer_call_after_install
 *
 * Plugin defaults installation
 *
 * @since	1.0.0
 * @return	void
 */
function insert_on_header_footer_call_after_install() {
	osc_set_preference( 'header_code', '', 'plugin-insert_on_header_footer', 'STRING' );
	osc_set_preference( 'footer_code', '', 'plugin-insert_on_header_footer', 'STRING' );
}
osc_register_plugin( osc_plugin_path( __FILE__ ), 'insert_on_header_footer_call_after_install' );

/**
 * insert_on_header_footer_call_after_uninstall
 *
 * Remove all plugin installed data
 *
 * @since	1.0.0
 * @return void
 */
function insert_on_header_footer_call_after_uninstall() {
	osc_delete_preference( 'header_code', 'plugin-insert_on_header_footer' );
	osc_delete_preference( 'footer_code', 'plugin-insert_on_header_footer' );
}
osc_add_hook( osc_plugin_path( __FILE__ ) . "_uninstall", 'insert_on_header_footer_call_after_uninstall' );

/**
 * insert_on_header_footer_actions
 *
 * Function that validates and process the saving of data
 *
 * @since	1.0.0
 * @return void
 */
function insert_on_header_footer_actions() {
	if ( Params::getParam( 'file' ) !== 'insert_on_header_footer/admin.php' ) {
		return;
	}

	// checking when saving data
	if ( Params::getParam( 'option' ) === 'settings_saved' ) {

	// set data
	osc_set_preference(	'header_code',
						Params::getParam( "header_code", false, false ),
						'plugin-insert_on_header_footer',
						'STRING' );

	osc_set_preference( 'footer_code',
						Params::getParam( "footer_code", false, false ),
						'plugin-insert_on_header_footer',
						'STRING' );

	// return message
    osc_add_flash_ok_message( __( 'Settings saved successfully', 'insert_on_header_footer' ), 'admin' );
    osc_redirect_to( osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ) );
  }
}
osc_add_hook( 'init_admin', 'insert_on_header_footer_actions' );

/**
 * insert_on_header_footer_admin
 *
 * Create admin pages of our plugin
 *
 * @since	1.0.0
 * @return  void
 */
function insert_on_header_footer_admin() {
	osc_admin_render_plugin( 'insert_on_header_footer/admin.php' );
}
osc_add_hook( osc_plugin_path( __FILE__ ) . "_configure", 'insert_on_header_footer_admin' );

/**
 * insert_on_header_footer_admin_menu
 *
 * Add menu inside Osclass admin panel
 *
 * @since	1.0.0
 * @return  void
 */
function insert_on_header_footer_admin_menu() {
	osc_admin_menu_plugins(
		'Insert on Header & Footer',
		osc_admin_render_plugin_url( 'insert_on_header_footer/admin.php' ),
		'insert_on_header_footer_submenu'
	);
}
osc_add_hook( 'admin_menu_init', 'insert_on_header_footer_admin_menu' );

/**
 * insert_on_header_footer_admin_init_style_script
 *
 * Load styling inside Osclass admin backend
 *
 * @since	1.0.0
 * @return  void
 */
function insert_on_header_footer_admin_init_style_script() {
	osc_enqueue_style(
		'insert_on_header_footer-style',
		osc_plugin_url( __FILE__ ) . 'assets/css/style.css'
	);

	// add code editor libraries
	osc_register_script( 'ace', osc_plugin_url( __FILE__ ) . 'assets/js/ace/ace.js' );
	osc_enqueue_script( 'ace' );
}
osc_add_hook( 'init_admin', 'insert_on_header_footer_admin_init_style_script' );

/**
 * insert_on_header_footer_admin_footer_script
 *
 * Load insert header footer JS
 *
 * @since	1.0.0
 * @return  void
 */
function insert_on_header_footer_admin_footer_script() {
	// I hate to do this but it seems there is no proper hooks to load scripts on admin footer.
	echo '<script type="text/javascript" src="' . osc_plugin_url( __FILE__ ) . 'assets/js/insert-header-footer.js' . '"></script>';
}
osc_add_hook( 'admin_footer', 'insert_on_header_footer_admin_footer_script' );

/**
 * insert_on_header_footer_init_head
 *
 * Insert the styling code or scripts on header
 *
 * @since	1.0.0
 * @return  string
 */
function insert_on_header_footer_init_head() {

	$header_code = osc_get_preference( 'header_code', 'plugin-insert_on_header_footer' );
	if( $header_code) {
		echo '<!-- HEADER CODE BEGIN -->' . "\n";
		echo stripslashes( $header_code ) . "\n";
		echo '<!-- HEADER CODE END -->' . "\n";
	}
}
osc_add_hook( 'header', 'insert_on_header_footer_init_head' );

/**
 * insert_on_header_footer_init_foot
 *
 * Insert the styling code or scripts on footer
 *
 * @since	1.0.0
 * @return	string
 */
function insert_on_header_footer_init_foot() {

	$footer_code = osc_get_preference( 'footer_code', 'plugin-insert_on_header_footer' );
	if( $footer_code ) {
		echo '<!-- FOOTER CODE BEGIN -->' . "\n";
		echo stripslashes( $footer_code ) . "\n";
		echo '<!-- FOOTER CODE END -->' . "\n";
	}
}
osc_add_hook( 'footer', 'insert_on_header_footer_init_foot' );
