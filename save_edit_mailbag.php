<html>
<head>
<title>The Bag</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "bag";

	$connect = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE product2 SET 
			Productname = '".$_POST["txtProductname"]."' ,
			Qty = '".$_POST["txtQty"]."' ,
			Price = '".$_POST["txtPrice"]."' 
			WHERE Productid = '".$_POST["txtProductid"]."' ";

	$query = mysqli_query($connect,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($connect);
?>
<a href="list_Edit_Delete_mailbag.php">View files</a>
</body>
</html>