<?php
/*
* Plugin Name: The Plus Addons for Elementor Page Builder Lite
* Plugin URI: https://theplusaddons.com/elementor/
* Description: Biggest collection of Widgets & Features to supercharge your Elementor Page builder in WordPress.
* Version: 2.0.2
* Author: POSIMYTH
* Author URI: https://theplusaddons.com/elementor/
* Text Domain: tpebl
* Elementor tested up to: 3.0.14
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
defined( 'L_THEPLUS_VERSION' ) or define( 'L_THEPLUS_VERSION', '2.0.2' );
define( 'L_THEPLUS_FILE__', __FILE__ );

define( 'L_THEPLUS_PATH', plugin_dir_path( __FILE__ ) );
define( 'L_THEPLUS_PBNAME', plugin_basename(__FILE__) );
define( 'L_THEPLUS_PNAME', basename( dirname(__FILE__)) );
define( 'L_THEPLUS_URL', plugins_url( '/', __FILE__ ) );
define( 'L_THEPLUS_ASSETS_URL', L_THEPLUS_URL . 'assets/' );
define('L_THEPLUS_ASSET_PATH', wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR . 'theplus-addons');
define('L_THEPLUS_ASSET_URL', wp_upload_dir()['baseurl'] . '/theplus-addons');
define( 'L_THEPLUS_INCLUDES_URL', L_THEPLUS_PATH . 'includes/' );



/* theplus language plugins loaded */
function l_theplus_pluginsLoaded() {
	load_plugin_textdomain( 'tpebl', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'l_theplus_elementor_load_notice' );
		return;
	}
	// Elementor widget loader	
    require( L_THEPLUS_PATH . 'widgets_loader.php' );
}
add_action( 'plugins_loaded', 'l_theplus_pluginsLoaded' );

/* theplus elementor load notice */
function l_theplus_elementor_load_notice() {	
	$plugin = 'elementor/elementor.php';	
	if ( theplus_elementor_activated() ) {
		if ( ! current_user_can( 'activate_plugins' ) ) { return; }
		$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
		$admin_notice = '<p>' . esc_html__( 'Elementor is missing. You need to activate your installed Elementor to use The Plus Addons.', 'tpebl' ) . '</p>';
		$admin_notice .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Elementor Now', 'tpebl' ) ) . '</p>';
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) { return; }
		$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
		$admin_notice = '<p>' . esc_html__( 'Elementor Required. You need to install & activate Elementor to use The Plus Addons.', 'tpebl' ) . '</p>';
		$admin_notice .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Elementor Now', 'tpebl' ) ) . '</p>';
	}
	echo '<div class="notice notice-error is-dismissible">'.$admin_notice.'</div>';
}


/**
	* Elementor activated or not
*/
if ( ! function_exists( 'theplus_elementor_activated' ) ) {
	
	function theplus_elementor_activated() {
		$file_path = 'elementor/elementor.php';
		$installed_plugins = get_plugins();
		
		return isset( $installed_plugins[ $file_path ] );
	}
}