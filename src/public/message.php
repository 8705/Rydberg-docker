<?php

$message = isset($_POST['msg']) ? $_POST['msg'] : '';

if ( $message !== '' ) {
	// redis post
	var_dump($message);
}