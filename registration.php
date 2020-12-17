<!--
	Registers an account to the database using php function password hash that encrypts the password 
	uses pdo method to communicate with the database to minimize sql injections 

-->

<?php
	
	if(isset($_POST['submit']))
	{	
		$username = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$options = [
			'cost' => 12
	];
		$hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);
	
		$name = "localhost";
		$dbuserName = "root";
		$dbpassword = "";
		$dbName = "test2";
		$conn = new PDO("mysql:host=$name;dbname=$dbName", $dbuserName, $dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("insert into userdetails 
		(username,email, password)
		VALUES (?,?,?)");
		$stmt->execute([$username, $email,$hashedpassword]);
		header('location: home.php');
		
	}else{
		header('location: registration.html?registration_falied');
		exit();
	}

?>