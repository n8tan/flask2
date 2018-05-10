<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://localhost/flask2/vendor/hybridauth/index.php",
		"providers" => array (

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "21066692106-i3r7dodi2qrqkoim6l9bsqmdcvvcff73.apps.googleusercontent.com", "secret" => "usAXCezS6xlAhLiXf-McYcwb" ),
			),

			"Facebook" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "XXXXXXXXX", "secret" => "XXXXXXXX" ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "XXXXXXXX", "secret" => "XXXXXXX" )
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
