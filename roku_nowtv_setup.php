<?php

# Name: Roku NowTV Setup Script
# Author: GTV
# Created: 04 Feb 2019
# Version 1.0


// vars
$ip_address = $argv[1];


// functions
function nowtv_login_keyboard($ip_address, $key){
	if($key == '1'){
		
	}
	if($key == '2'){
		keypress($ip_address, 'Right', '0');
	}
	if($key == '3'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '4'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '5'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '6'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '7'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '8'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '9'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}
	if($key == '0'){
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
		keypress($ip_address, 'Right', '0');
	}

	// select item
	keypress($ip_address, 'Select', '1');

	// reset keyboard for next key
	keypress($ip_address, 'Back', '2');
	keypress($ip_address, 'Select', '1');
}


function keypress($ip_address, $key, $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/keypress/".$key);
	sleep($sleep);
}

function load_channel($ip_address, $channel_id, $content_id = '', $sleep = '1'){
	exec("curl --silent --output /dev/null -d '' http://".$ip_address.":8060/launch/".$channel_id."?contentID=".$content_id);
	sleep($sleep);
}


// load NowTV ready for initial login
echo "Loading NowTV login screen. \n";
// load_channel($ip_address, '20242', 1402, 20);

// enter username text box
keypress($ip_address, 'Select', 2);

// letter j
nowtv_login_keyboard($ip_address, '1');
nowtv_login_keyboard($ip_address, '2');
nowtv_login_keyboard($ip_address, '3');
nowtv_login_keyboard($ip_address, '4');
nowtv_login_keyboard($ip_address, '5');
nowtv_login_keyboard($ip_address, '6');
nowtv_login_keyboard($ip_address, '7');
nowtv_login_keyboard($ip_address, '8');
nowtv_login_keyboard($ip_address, '9');
nowtv_login_keyboard($ip_address, '0');


