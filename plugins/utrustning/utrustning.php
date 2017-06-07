<?php
/**
 * Plugin Name: Utrustning
 * Description: This plugin adds info
 * Version: 1.0.0
 * Author: Patrik Drivstedt
 * License: Do What You Want With This!
 */



require "utrustning-info.php";
//require "template-override.php";

function utrustning_google_map_api($api){
	$api['key'] = 'AIzaSyAa38IcC1aetYkYfpdKdBWTU3qLtn_UqEE';
	return $api;
}
add_filter('acf/fields/google_map/api', 'utrustning_google_map_api');