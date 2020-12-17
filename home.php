<!-- 
	The home page that provides the user to login or register an account.
	The form is created using bootstrap 


-->

<?php
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skoop order processing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #99ddff">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Skoop order processing</a>
    </div>
  </div>
	<?php
	echo "<ul class='nav navbar-nav'>
			<li><a href='upload.php'>Upload csv file</a></li>
			<li><a href='index.php'>view order</a></li>
			</ul>"; 
		if(isset($_SESSION['email'])){
			echo '<form class="form-inline" action="logout.php" method="POST">
    <div class="form-group">
	
	  <button type="submit" name="logout" class="btn btn-success btn-md">Logout</input>
    </div>   
</form>';
		}
		else{
			echo "<ul class='nav navbar-nav'>
			<li><a href='login.html'>Login</a></li>
			<li><a href='registration.html'>Register</a></li>
			</ul>"; 
		}
	?>
	 
</nav>

</body>
</html>
