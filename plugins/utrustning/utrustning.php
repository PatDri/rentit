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

function utrustning_the_content_filter($content){
	if(get_post_type()!=='utrustning'){
		return $content;
	}
	$images = get_field('gallery');
	$html ="";
	if(!empty($images)){
		$html .= "<div class ='utrustning_gallery'>";
		foreach($images as $image){
			$image_url = $image['url'];
			$thumb_url =$image['sizes']['thumbnail'];
			$html .="<a href = '{$image_url}' data-lightbox ='utrustning_gallery'><img src= '{$thumb_url}'></a>";
		}

		$html .="</div>";
	}

	
	return $html . $content;
}
add_filter('the_content', 'utrustning_the_content_filter');

function utrustning_google_map_api($api){
    $api['key'] = 'AIzaSyAa38IcC1aetYkYfpdKdBWTU3qLtn_UqEE';
    return $api;
}
add_filter('acf/fields/google_map/api', 'utrustning_google_map_api');
