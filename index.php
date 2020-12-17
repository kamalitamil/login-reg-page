<!--
	This page displays the information of each order thats in the database
	The file uses bootstrap, and datatables to present the information correctly. 

-->

<?php

	include_once('home.php');
	
	if(isset($_SESSION['email']))
	{
	?>
		
<link rel="stylesheet" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


<script>
	$(document).ready( function () {
    $('.table').DataTable();
} );

</script>

<table class ="table">
	<thead>
		<tr>
			<th>order number</th>
			<th> product code </th>
			<th>contact details</th>
			<th>shipping status</th>
		</tr>
	
	
	</thead>

	<tbody>
		<?php
		$name = "localhost";
		$userName = "root";
		$password = "";
		$dbName = "test2";
	
	
		$pdo = new PDO("mysql:host=$name;dbname=$dbName", $userName, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		$stmt = $pdo->prepare("SELECT * FROM orders");
		$stmt->execute(); 
		
		while($row = $stmt->fetch()):
		
			?>
			<tr>
				
				<td> <?php echo '<a href="getUserInfo.php?address='?><?php echo$row["address_line_one"];?>
				&address2=<?php echo $row['address_line_two'];?>
				&sub=<?php echo $row['suburb'];?>
				&code=<?php echo $row['postcode'];?>
				&state=<?php echo $row['state'];?>
				&productcode=<?php echo $row['product_code'];?>
				&name=<?php echo $row['name'];?>
				&id">
				<?php echo $row["order_id"]; ?> <?php echo '</a>';?>
				</td>
				
				<td> <?php echo $row['product_code']; ?> </td> 
				<td> <?php echo $row['mobile']; ?> </td> 
				<td> <?php echo $row['status']; ?> </td> 				
			</tr>
				
			
		<?php endwhile;?>
	</tbody>
</table>
	<?php }else{
		header('location: login.html?login_required');
		exit();
	}

?>