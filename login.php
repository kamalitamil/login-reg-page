<!--
	This page processes the user email and password from the database
	The file uses password verify to de-hash the password and check for valid password
	The file uses pdo method to connect to the database to minimize sql injections.
	
	
-->

<?php

	session_start();
	$name = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "test2";
	
	
	$pdo = new PDO("mysql:host=$name;dbname=$dbName", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $pdo->prepare("SELECT * FROM userdetails
	WHERE email = ?");
	$stmt->execute([$_POST['email']]);
	$row = $stmt->fetch();
	
	if(password_verify($_POST['password'],$row['password']))
	{
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		header('location: index.php?success');
		exit();
	}else {
		header('location: login.html?login_failed');
		exit();
		
	}
	

	
?>