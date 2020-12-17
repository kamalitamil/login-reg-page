<!--
	After the users clicks on an order on the index.php the user is directed here the prints
	more information about that order using the bootstrap table and the vaules that have been passed

-->

<link rel="stylesheet" href="styles/bootstrap.css">



<table class ="table">
	<thead>
		<tr>
			<th>Full Name</th>
			<th>id</th>
			<th>Address line one</th>
			<th>Address line two</th>
			<th>Suburb</th>
			<th>Post code</th>
			<th>State</th>
			<th>Product code</th>
			
			
		</tr>
	
	
	</thead>
	
	<tbody>
		<tr>
			<td> <?php echo $_GET['name']; ?> </td>
			<td> <?php echo $_GET['id']; ?> </td>
			<td> <?php echo $_GET['address']; ?></td>
			<td> <?php echo $_GET['address2']; ?> </td>
			<td> <?php echo $_GET['sub']; ?> </td>
			<td> <?php echo $_GET['code']; ?> </td>
			<td> <?php echo $_GET['state']; ?> </td>
			<td> <?php echo $_GET['productcode']; ?> </td>
		</tr>
	</tbody>
	
