<?php
require_once("connect.php");
$productpic="SELECT * FROM product";
$sql=mysqli_query($connect,$productpic);
if(!$sql)
{
  echo $connect->error;
  exit();
}
?>
<!DOCTYPE html>
<head>

    <html>
<title>The Bag</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu --> 
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>THE BAG</b></h3>
  </div>
   <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Shirts</a>
    <a href="#" class="w3-bar-item w3-button">Dresses</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
		Bag <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="bagpack.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Bagpack</a>
      <a href="mailbag.php" class="w3-bar-item w3-button"><i class="fa fa-caret-right w3-margin-right"></i>Mailbag</a>
      <a href="wallet.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Wallet</a>
      
    </div>
   
     <a href="#" class="w3-bar-item w3-button">Jackets</a>
    <a href="#" class="w3-bar-item w3-button">Gymwear</a>
    <a href="#" class="w3-bar-item w3-button">Blazers</a>
    <a href="#" class="w3-bar-item w3-button">Shoes</a>
    <a href="#" class="w3-bar-item w3-button">Commingsoon</a>
    
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">THE BAG</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <?php 
  $objResult = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    ?>

  <header class="w3-container w3-xlarge">
    <p class="w3-right">
	  <i class="fa fa-user" style="width: 4px"></i> 
	  <i><?php
  session_start();
  if($_SESSION['UserID'] == "")
  {
    echo "Please Login!";
    exit();
  }

  if($_SESSION['Status'] != "USER")
  {
    echo "This page for User only!";
    exit();
  } 
  
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "";
  $dbName = "bag";

  $objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);

  $strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult1 = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
 <?php echo $objResult1["Email"];?>
  <br><a href="edit_profile.php">Edit</a>
  <a href="logout.php">Logout</a>
<?php
  mysqli_close($objCon);
?></i>

        <img style="width:100%;height:100%" src="<?php echo $objResult ["Productpic"];?>"> 
    </p>
  </header>

  <!-- Image header -->
  <div class="w3-display-container w3-container">
 
    </div>
  <div class="w3-container w3-text-grey" id="wallet">
    <p><b>Wallet</b></p>
    <p>8 items</p>
	<?php
ini_set('display_errors', 1);
error_reporting(~0);


if (!$connect) {
    echo $connect->connect_error;
    exit();
}

$strSQL = "SELECT * FROM product3";
$objQuery = mysqli_query($connect,$strSQL);
if(!$objQuery)
{
	echo $connect->error;
	exit();
}
?>

<?php
?><html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<center>
<?php
$con=mysqli_connect("localhost","root","","bag");
$strSQL="select * from product3";
$objQuery=mysqli_query($con,$strSQL) or die(mysqli_error());
?>
<table width="900"  border="1">
  <tr>
    <td width="101"><center>Picture</td>
    <td width="82"><center>ProductName</td>
    <td width="79"><center>Price</td>
    <td width="37"><center>Cart</td>
  </tr>
  <?php
  while($objResult = mysqli_fetch_array($objQuery))
  {
  ?>
  <tr>
 
	<td><center><img style="width:260px;height:320px" src="<?php echo $objResult["img"];?>"></td>
    <td><center><?php echo $objResult["Productname"];?></td>
    <td><center><?php echo $objResult["Price"];?></td>
    <td><center><a href="order_wallet.php?ProductID=<?php echo $objResult["Productid"];?>">Order</a></td>
    
  </tr>
  <?php
  }
  ?>
</table>
<br><br><a href="show_wallet.php">View Cart</a> | <a href="clear_wallet.php">Clear Cart</a>
<?php
mysqli_close($con);
?>
    </center>
  </div>
      
  <?php

ini_set('display_errors', 1);
error_reporting(~0);


if (!$connect) {
    echo $connect->connect_error;
    exit();
}

$strSQL = "SELECT * FROM product3";
$objQuery = mysqli_query($connect,$strSQL);
if(!$objQuery)
{
	echo $connect->error;
	exit();
}
?>
        
  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
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

  <div class="w3-black w3-center w3-padding-24"></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
    // Accordion 
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "Jeans" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn").click();


    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>


</head>
<body>
    <form id="form1" runat="server">
        <div>
        </div>
    </form>
</body>
</html>

