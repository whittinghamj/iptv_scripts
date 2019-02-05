<?php

function keypress($ip_address, $key){
	execl();
}

function load_channel($ip_address, $channel_id, $content_id = ''){
	exec("curl -d '' http://".$ip_address.":8060/launch/".$channel_id."?contentID=".$content_id);
}

// curl -d '' http://$IP_ADDRESS:8060/launch/20242?contentID=1402

load_channel('192.168.1.180', '20242', 1402);