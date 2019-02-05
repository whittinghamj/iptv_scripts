<?php

function keypress($ip_address, $key){
	execl()
}

function load_channel($ip_address, $channel_id, $content_id = ''){
	exec("curl -d '' http://".$ip_address.":8060/launch/".$channel_id."?contentID=".$content_id);
}

