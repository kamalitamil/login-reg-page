<!--
Processing the file uploaded and saves it in the database 
if the state email and file type is valid



-->


<?php 

	$filename =  basename($_FILES["file"]["name"]);	
	$ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	
	if(isset($_POST['sub']) && $ext == "csv")
	{
		 		
		$csv = array();
		$file = fopen($filename, 'r');
	
		$name = "localhost";
		$dbuserName = "root";
		$dbpassword = "";
		$dbName = "test2";
		$conn =   mysqli_connect($name,$dbuserName,$dbpassword,$dbName);

	while (($result = fgetcsv($file,10000,",")) !== false)
	{
		$arr = array("NSW", "VIC", "QLD", "SA", "TA", "ACT", "NT");
		
			if (filter_var($result[1], FILTER_VALIDATE_EMAIL)) {
				$set = false;		
			for($i = 0; $i < sizeof($arr); $i++)
			{
				if($result[4] == $arr[$i]){
					$set = true;
					$sql = "insert into orders(name,email,address_line_one,postcode,state,country,product_code) 
					values('$result[0]','$result[1]','$result[2]','$result[3]','$result[4]',
					'$result[5]','$result[6]')";
					mysqli_query($conn,$sql);
				}
				if($i == 6 && $set==false)
				{
					$sql = "insert into orders(name,email,address_line_one,postcode,state,country,product_code) 
					values('$result[0]','$result[1]','$result[2]','$result[3]','Error',
					'$result[5]','$result[6]')";
					mysqli_query($conn,$sql);
				}
				
			}
			} else {
					$sql = "insert into orders(name,email,address_line_one,postcode,state,country,product_code) 
					values('$result[0]','Error','$result[2]','$result[3]','$result[4]',
					'$result[5]','$result[6]')";
					mysqli_query($conn,$sql);
					
		}	
	}
		fclose($file);
		header('location: index.php?upload_complete');
		exit();
	}
 		
 else{
	header('location: upload.php?upload_failed');
	exit();
}
	
	
?>