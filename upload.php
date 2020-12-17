<!--
	Form for the user to upload csv files


-->

<?php

	include_once('home.php');
	
	if(isset($_SESSION['email']))
	{
	?>
<!DOCTYPE html>
<html>
<head>
<title> Skoop order processing </title>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<link rel="stylesheet" href="styles/bootstrap.css">
</head>
<body>
<div class="container">
<br>
 <form class="form-inline" action="csv.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
	  <input type="file" name="file" class="form-control">
	  <input type="submit" class="form-control" value="Upload file" name="sub" class="btn btn-success btn-md"></input>
    </div>   
</form>
</div>


</body>
</html><?php
	}else{
		header('location: login.html?login_required');
		exit();
	}
?>
