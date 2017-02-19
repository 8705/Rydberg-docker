<?php

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


$insert_query = $dbh->prepare("INSERT INTO test (name) VALUES (?)");
$insert_query->execute(['aaa']);

$stmt = $dbh->query("SELECT * FROM test");
$count = $dbh->rowCount();

echo $count;