<?php

// DB情報
define('DB_HOST', 'localhost');
define('DB_NAME', 'rydberg');
define('DB_USER', 'rydberg');
define('DB_PASS', 'v8kYAbpAYPJz');

// DB接続
try {
	$dbh = new PDO(
		'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
		DB_USER,
		DB_PASS,
		array(PDO::ATTR_EMULATE_PREPARES => false)
	);
} catch (PDOException $e) {
	exit('データベース接続失敗。'.$e->getMessage());
}


$insert_query = $dbh->prepare("INSERT INTO test (name) VALUES (?)");
$insert_query->execute(['aaa']);

$stmt = $dbh->query("SELECT * FROM test");
$count = $dbh->rowCount();

echo $count;