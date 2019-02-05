<?php

# Name: Roku NowTV Setup Script
# Author: GTV
# Created: 04 Feb 2019
# Version 1.0


// vars
$ip_address = $argv[1];


// functions
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
load_channel($ip_address, '20242', 1402, 10);

// enter username text box
keypress($ip_address, 'Select', 1);

keypress($ip_address, 'Down', 1);
keypress($ip_address, 'Down', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Right', 1);
keypress($ip_address, 'Select', 1);

keypress($ip_address, 'Back', 1);
keypress($ip_address, 'Select', 1);

keypress($ip_address, 'Down', 1);
keypress($ip_address, 'Down', 1);
keypress($ip_address, 'Select', 1);