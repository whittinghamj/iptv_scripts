<?php

# Name: Roku NowTV Setup Script
# Author: GTV
# Created: 04 Feb 2019
# Version 1.0


// vars
$ip_address 		= $argv[1];
$command			= $argv[2];

if(isset($argv[3])){
	$channel 		= $argv[3];
}

// functions
function get_device_info($ip_address){
	$url_data = @file_get_contents("http://".$ip_address.":8060/query/device-info");
	$xml = new SimpleXMLElement($url_data);

	return $xml;
}

function get_active_app($ip_address){
	$url_data = @file_get_contents("http://".$ip_address.":8060/query/active-app");
	$xml = new SimpleXMLElement($url_data);

	return $xml;
}

function keypress($ip_address, $key, $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/keypress/".$key);
	sleep($sleep);
}

function load_channel($ip_address, $channel_id, $content_id = '', $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/launch/".$channel_id."?$contentID=".$content_id);
	sleep($sleep);
}

if($command == 'device_info'){
	$device_info = get_device_info($ip_address);

	$json = json_encode($device_info);
}

if($command == 'active_app'){
	$active_app = get_active_app($ip_address);

	$json = json_encode($active_app);

	echo $json;
}

if($command == 'channel'){
	# entertainment pass
	if($channel =="sky_one"){
	   	$channel_name='Sky One';
		$contentID='1402';
	}

	if($channel =="sky_witness"){
		$channel_name='Sky Witness';
		$contentID='2201';
	}

	if($channel =="sky_atlantic"){
		$channel_name='Sky Atlantic';
		$contentID='1412';
	}

	if($channel =="gold"){
		$channel_name='GOLD';
		$contentID='2304';
	}

	if($channel =="comedy_central"){
		$channel_name='Comedy Central';
		$contentID='2510';
	}

	if($channel =="syfy"){
		$channel_name='Syfy';
		$contentID='2505';
	}

	if($channel =="sky_arts"){
		$channel_name='Sky Arts';
		$contentID=1752;
	}

	if($channel =="fox"){
		$channel_name='FOX';
		$contentID=1305;
	}

	if($channel =="discovery_channel"){
		$channel_name='Discovery Channel';
		$contentID=2401;
	}

	if($channel =="mtv"){
		$channel_name='MTV';
		$contentID=2501;
	}

	if($channel =="wild"){
		$channel_name='WILD';
		$contentID=1847;
	}


	# kids pass
	if($channel =="cartoon_network"){
		$channel_name='Cartoon Network';
		$contentID=5601;
	}

	if($channel =="boomerang"){
		$channel_name='Boomerang';
		$contentID=5609;
	}

	if($channel =="nickelodean"){
		$channel_name='Nickelodean';
		$contentID=1846;
	}

	if($channel =="nick_toons"){
		$channel_name='Nick Toons';
		$contentID=1849;
	}

	if($channel =="nick_jr"){
		$channel_name='Nick.Jr';
		$contentID=1857;
	}

	if($channel =="cartoonito"){
		$channel_name='Cartoonito';
		$contentID=1371;
	}


	# movies pass
	if($channel =="sky_cinema_premiere"){
		$channel_name='Sky Cinema Premiere';
		$contentID=1409;
	}

	if($channel =="sky_cinema_megahits"){
		$channel_name='Sky Cinema Megahits';
		$contentID=1814;
	}

	if($channel =="sky_cinema_greats"){
		$channel_name='Sky Cinema Greats';
		$contentID=1815;
	}

	if($channel =="sky_cinema_disney"){
		$channel_name='Sky Cinema Disney';
		$contentID=1838;
	}

	if($channel =="sky_cinema_family"){
		$channel_name='Sky Cinema Family';
		$contentID=1808;
	}

	if($channel =="sky_cinema_action"){
		$channel_name='Sky Cinema Action';
		$contentID=1001;
	}

	if($channel =="sky_cinema_comedy"){
		$channel_name='Sky Cinema Comedy';
		$contentID=1002;
	}

	if($channel =="sky_cinema_thriller"){
		$channel_name='Sky Cinema Thriller';
		$contentID=1818;
	}

	if($channel =="sky_cinema_drama"){
		$channel_name='Sky Cinema Drama';
		$contentID=1816;
	}

	if($channel =="sky_cinema_sci}"){
		$channel_name='Sky Cinema Sci}';
		$contentID=1807;
	}

	if($channel =="sky_cinema_select"){
		$channel_name='Sky Cinema Select';
		$contentID=1811;
	}


	# sports pass
	if($channel =="sky_sports_news"){
		$channel_name='Sky Sports News';
		$contentID=1811;
	}

	echo "Changing channel to ".$channel_name."\n";
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/launch/20242?contentID=".$contentID);
}

if($command == 'enable_dev'){
	echo "Attempting to enable Dev mode. \n";

	echo "\n";

	echo "If this does not work then try the following using the remote. \n";

	echo "\n";

	echo "Home Home Home Up Up Right Left Right Left Right \n";

	echo "\n";

	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Left', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Left', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
}

if($command == 'reboot'){
	echo "Rebooting Roku. \n";

	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Select', 0);
}

if($command == 'setup'){
	echo "Configuring Roku for IPTV. \n";

	echo " - Disabling the screensaver. \n";

	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Select', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);

	echo " - Changing the theme. \n";

	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Home', 0);
	usleep(500000);
	keypress($ip_address, 'Up', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Down', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(500000);
	keypress($ip_address, 'Right', 0);
	usleep(2000000);
	keypress($ip_address, 'Select', 0);
	usleep(2000000);
	keypress($ip_address, 'Select', 0);
	usleep(2000000);
	keypress($ip_address, 'Home', 0);
}
