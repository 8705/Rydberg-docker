<?php

$message = isset($_POST['msg']) ? $_POST['msg'] : '';

if ( $message !== '' ) {
	// redis post
	$redis = new Redis();
	$redis->connect($_ENV['REDIS_HOST'],$_ENV['REDIS_PORT']);
	$redis->publish("chat", $message);
}