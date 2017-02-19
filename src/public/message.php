<?php

$message = isset($_POST['msg']) ? $_POST['msg'] : '';

if ( $message === '' ) return;


// DB接続
try {
	$dbh = new PDO(
		'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'].';charset=utf8',
		$_ENV['DB_USER'],
		$_ENV['DB_PASS'],
		array(PDO::ATTR_EMULATE_PREPARES => false)
	);
} catch (PDOException $e) {
	exit('データベース接続失敗。'.$e->getMessage());
}

$query = $dbh->prepare("INSERT INTO messages (message) VALUES (?)");
$query->execute([$message]);

// redis post
$redis = new Redis();
$redis->connect($_ENV['REDIS_HOST'],$_ENV['REDIS_PORT']);
$redis->publish("chat", $message);