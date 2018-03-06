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

	$strCustomerID = $_GET["Productid"];
	$sql = "DELETE FROM product3
			WHERE Productid = '".$strCustomerID."' ";

	$query = mysqli_query($connect,$sql);

	if(mysqli_affected_rows($connect)) {
		 echo "Record delete successfully";
	}

	mysqli_close($connect);
?>
<a href="list_Edit_Delete_wallet.php">View files</a>
</body>
</html>