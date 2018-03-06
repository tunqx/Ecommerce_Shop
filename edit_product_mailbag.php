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

   $strCustomerID = null;

   if(isset($_GET["Productid"]))
   {
	   $strCustomerID = $_GET["Productid"];
   }
  
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "bag";

   $connect = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM product2 WHERE Productid = '".$strCustomerID."' ";

   $query = mysqli_query($connect,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="save_edit_mailbag.php" name="frmAdd" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">Productid</th>
    <td width="238"><input type="hidden" name="txtProductid" value="<?php echo $result["Productid"];?>"><?php echo $result["Productid"];?></td>
    </tr>
  <tr>
    <th width="120">Productname</th>
    <td><input type="text" name="txtProductname" size="20" value="<?php echo $result["Productname"];?>"></td>
    </tr>
  <tr>
    <th width="120">Qty</th>
    <td><input type="text" name="txtQty" size="20" value="<?php echo $result["Qty"];?>"></td>
    </tr>
  <tr>
    <th width="120">Price</th>
    <td><input type="text" name="txtPrice" size="2" value="<?php echo $result["Price"];?>"></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="submit">
</form>
<?php
mysqli_close($connect);
?>
</body>
</html>