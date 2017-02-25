<?php

// DB接続
try {
	$dbh = new PDO(
		'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'].';charset=utf8',
		"root",
		"root",
		array(PDO::ATTR_EMULATE_PREPARES => false)
	);
} catch (PDOException $e) {
	exit('データベース接続失敗。'.$e->getMessage());
}


$query = $dbh->prepare("INSERT INTO test (name) VALUES (?)");
$query->execute(['aaa']);

$stmt = $dbh->query("SELECT * FROM test");
$count = $stmt->rowCount();

echo $count;