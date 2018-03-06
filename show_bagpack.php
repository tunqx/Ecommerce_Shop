<?php
session_start();
?>
<html>
<head>
  <title>The Bag</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php

if(!isset($_SESSION["intLine"]))
{
	echo "Cart empty";
	exit();
}
$connect=mysqli_connect("localhost","root","","bag");
?>
<table width="400"  border="1">
<div class="container">
  <center><h2>Order In Cart</h2></center>
	<br/>
	<table class="table">
    <thead>
		<tr class="success">
    <td  width="101"><b>ProductID</b></td>
    <td width="82"><b>ProductName</b></td>
    <td width="82"><b>Price</b></td>
    <td width="79"><b>Qty</b></td>
    <td width="79"><b>Total</b></td>
    <td width="10"><b>Delete</b></td>
				
  </tr>
	</thead>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM Product1 WHERE Productid = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysqli_query($connect,$strSQL)  or die(mysqli_error());
		$objResult = mysqli_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>

	  <tr class="active">
		<td><?php echo $_SESSION["strProductID"][$i];?></td>
		<td><?php echo $objResult["Productname"];?></td>
		<td><?php echo $objResult["Price"];?></td>
		<td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo number_format($Total,2);?></td>
		<td><a href="delete_bagpack.php?Line=<?php echo $i;?>">x</a></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<h3><b>Sum Total : <?php echo number_format($SumTotal,2);?> THB</b></h3> 
<a href="bagpack.php">Go to Product</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php">CheckOut</a>
<?php
	}
?>
<?php
mysqli_close($connect);
?>
</body>
</html>