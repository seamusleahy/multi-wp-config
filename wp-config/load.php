<?php
/**
 * Load up the config settings based for the server.
 */
$_wp_config_load_server = $_SERVER['SERVER_NAME'].rtrim(str_replace('/', '.',dirname($_SERVER['PHP_SELF'])), " \t\n\r\0\x0B.");
$_wp_config_url = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);

// Handles custom mapping of server to another server setting
if(isset($wp_config_alias)) {
	if(!empty($wp_config_alias[$_wp_config_load_server])) {
		$_wp_config_load_server = $wp_config_alias[$_wp_config_load_server];
	}
}

// Load the configuration file
if(file_exists(dirname(__FILE__) . '/' . $_wp_config_load_server . '.php')) {
	include(dirname(__FILE__) . '/' . $_wp_config_load_server . '.php');

// Fall back to default it not found
} else {
	include(dirname(__FILE__) . '/default.php');
}
