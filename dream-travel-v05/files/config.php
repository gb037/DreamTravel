<?php

   // print_r(PDO::getAvailableDrivers());
		//session_start();


	//connect to the DB
	$dsn = 'mysql:host=127.0.0.1;dbname=dream-travel-v05';
	$user = 'root';
	$dbpassword = '';
	
	try {
		$db = new PDO($dsn, $user, $dbpassword);
	} catch (PDOException $e) {
		   die('Sorry, database problem');
	}

	require_once 'authorise.php';
	
	//print_r(PDO::getAvailableDrivers());
?>