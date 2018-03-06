<?php
//session_start();
//session_destroy();
?><html>
<head>
<title>The Bag</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php
$con=mysqli_connect("localhost","root","","bag");
$strSQL="select * from product1";
$objQuery=mysqli_query($con,$strSQL) or die(mysqli_error());
?>
<table width="327"  border="1">
  <tr>
    <td width="101">Picture</td>
    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="79">Price</td>
    <td width="37">Cart</td>
  </tr>
  <?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
  ?>
  <tr>
	<td><img style="width:200px;height:200px" src="<?php echo $objResult["img"];?>"></td>
    <td><?php echo $objResult["Productid"];?></td>
    <td><?php echo $objResult["Productname"];?></td>
    <td><?php echo $objResult["Price"];?></td>
    <td><a href="order.php?ProductID=<?php echo $objResult["Productid"];?>">Order</a></td>
  </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
<?php
mysqli_close($con);
?>
</body>
</html>