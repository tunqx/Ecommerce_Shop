<?php ini_set('display_errors', 1);
error_reporting(~0);


if (!$connect) {
    echo $connect->connect_error;
    exit();
}

$strSQL = "SELECT * FROM product1";
$objQuery = mysqli_query($connect,$strSQL);
if(!$objQuery)
{
	echo $connect->error;
	exit();
}
?>
<center>
<table width="1000" border="1">

  <tr>
    <td width="101"><center>Picture</center></td>
    <td width="101"><center>ProductID</center></td>
    <td width="82"><center>ProductName</center></td>
    <td width="50"><center>Price</center></td>
    <td width="100"><center>Qty</center></td>
  </tr>
  <?php
  while($objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))
  {
  ?>
  <tr>
  <form  action="order.php" method="post">
	<td><img style="width:200px;height:200px" src="<?php echo $objResult["Picture"];?>"></td>
    <td><?php echo $objResult["ProductID"];?></td>
    <td><?php echo $objResult["ProductName"];?></td>
    <td><?php echo $objResult["Price"];?></td>
   <td><input type="hidden" name="txtProductID" value="<?php echo $objResult["ProductID"];?>" size="2"> <input type="text" name="txtQty" value="1" size="2"> <input type="submit" value="Add"></td>
   </form>
  </tr>
  <?php
  }
  ?>
</table>

<br><br><a href="show.php">View Cart</a> | <a href="clear.php">Clear Cart</a>
</center>
<?php
mysqli_close($connect);
?>