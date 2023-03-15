<?php
	$db_host = "localhost";
	$db_username = "liu676";
	$db_password = "Bl2ck.5";
	$db_dbname = "liu676";
	$charset = 'utf8mb4';
	$attr = "mysql:host=$db_host;dbname=$db_dbname;charset=$charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	
?>
