<!--
	This file logs out the user and destroys all the credential  

-->

<?php
	if(isset($_POST['logout']))
	{
		session_start();
		session_unset();
		session_destroy();
		header("Location: home.php");
		exit();
	}
?>