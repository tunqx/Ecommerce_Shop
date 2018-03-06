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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">
</head>
<?php
$connect=mysqli_connect("localhost","root","","bag");
?>
<table width="400"  border="1">
<table width="400"  border="1">
<div class="container">
  <center><h2><b>Checkout</b></h2></center>
	<br/>
	<table class="table">
    <thead>
		<tr class="success">
  
    <td width="101"><b>ProductID</b></td>
    <td width="82"><b>ProductName</b></td>
    <td width="82"><b>Price</b></td>
    <td width="79"><b>Qty</b></td>
    <td width="79"><b>Total</b></td>
  </tr></thead>
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
	  <tr>
		<td><?php echo $_SESSION["strProductID"][$i];?></td>
		<td><?php echo $objResult["Productname"];?></td>
		<td><?php echo $objResult["Price"];?></td>
		<td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo number_format($Total,2);?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
<b><h3>Sum Total <?php echo number_format($SumTotal,2);?> THB</h3><b>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
<center><h2><b>Delivered</b></h2></center>

<!-- Footer -->
<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Your Contact</h4>
        <p>delivered to...</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="txtName" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Tel Number" name="txtTel" required></p>
          <p><input class="w3-input w3-border" type="email" placeholder="Email" name="txtEmail" required></p>
          <p><input class="w3-input w3-border" type="textarea" placeholder="Address" name="txtAddress" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> The Bag</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> thebag@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>




<?php
mysqli_close($connect);
?>
</body>
</html>