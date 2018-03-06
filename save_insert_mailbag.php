<?php

require_once("connect.php");

?>
<html>
<head>
<title>The Bag</title>
</head>
<body>
<?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"insert_img/".$_FILES["filUpload"]["name"]))
	{

		$strSQL = "INSERT INTO product2 ";
        $strSQL .="(Productname,Price,Qty,img) VALUES ('".$_POST["product_name"]."','".$_POST["product_price"]."','".$_POST["product_qty"]."'
        ,'pic/".$_FILES["filUpload"]["name"]."')";
		$objQuery = mysqli_query($connect,$strSQL);		
	}
	
?>
<a href="admin_page.php">View files</a>
</body>
</html>