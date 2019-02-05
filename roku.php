<?php

# Name: Roku NowTV Setup Script
# Author: GTV
# Created: 04 Feb 2019
# Version 1.0


// vars
$ip_address 		= $argv[1];
$command			= $argv[2];

// functions
function get_device_info($ip_address){
	$url_data = @file_get_contents("http://".$ip_address.":8060/query/device-info");
	$xml = new SimpleXMLElement($url_data);
	$data = $xml;

	return $xml;
}

function keypress($ip_address, $key, $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/keypress/".$key);
	sleep($sleep);
}

function load_channel($ip_address, $channel_id, $content_id = '', $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/launch/".$channel_id."?contentID=".$content_id);
	sleep($sleep);
}


echo "Getting Device Details: ".get_device_info($ip_address)."\n";

echo "Complete. \n";