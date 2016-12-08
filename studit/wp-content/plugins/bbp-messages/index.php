<?php
/*
Plugin Name: bbPress Messages Lite
Plugin URI: 
Description: bbPress Messages - User Private Messages with notifications, widgets and media with no BuddyPress needed.
Author: Samuel Elh
Version: 0.2.3.1
Author URI: http://samelh.com
*/

// verify whether bbPress is active or not
function bbpm_is_bbpress_active() {
	return get_option('active_plugins') > '' && in_array( 'bbpress/bbpress.php', get_option('active_plugins') );
}

// initialize the bbPress Messages plugin
if( ! function_exists('bbp_messages') && bbpm_is_bbpress_active() ) {

	function bbp_messages() {

		defined( 'BBPM_URL' )		|| define( 'BBPM_URL', plugin_dir_url(__FILE__) );
		defined( 'BBPM_PATH' )  	|| define( 'BBPM_PATH', plugin_dir_path(__FILE__) );
		defined( 'BBPM_FILE' )		|| define( 'BBPM_FILE', __FILE__ );
		defined( 'BBPM_TABLE' )		|| define( 'BBPM_TABLE', 'bbp_messages' );
		defined( 'BBPM_DIR_NAME' )	|| define( 'BBPM_DIR_NAME', str_replace( '/index.php', '', plugin_basename( __FILE__ ) ) );
		defined( 'BBPM_VER' )		|| define( 'BBPM_VER', "0.2.3" );

		# load the loader class 
		require 'includes/core/loader.php';

	}

	// init
	bbp_messages();

}

// Alert the admin that parent bbPress is needed for bbPM plugin
add_action( 'admin_notices', function() {
	
	if( bbpm_is_bbpress_active() )
		return;

	echo '<div class="error notice is-dismissible"><p><strong>bbPress Messages notice</strong>: bbPress plugin is a requirement, please activate <a href="https://wordpress.org/plugins/bbpress/">bbPress</a> to use the messaging functionality.</p></div>';

});