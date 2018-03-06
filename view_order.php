<html>
<head>
<title>The Bag</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<?php
$connect=mysqli_connect("localhost","root","","bag");

$strSQL = "SELECT * FROM orders WHERE Orderid = '".$_GET["OrderID"]."' ";
$objQuery = mysqli_query($connect,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<h3><center><b>Receipt</b></center></h3>
<table class="table">
<thead>
    <tr class="success">

      <td width="71">OrderID</td>
      <td width="217">
	  <?php echo $objResult["OrderID"];?></td>
    </tr>
    <tr class="danger">
      <td width="71">Name</td>
      <td width="217">
	  <?php echo $objResult["Name"];?></td>
    </tr>
    <tr class="info">
      <td>Address</td>
      <td><?php echo $objResult["Address"];?></td>
    </tr>
    <tr class="warning">
      <td>Tel</td>
      <td><?php echo $objResult["Tel"];?></td>
    </tr>
    <tr class="active">
      <td>Email</td>
      <td><?php echo $objResult["Email"];?></td>
    </tr>
    </thead>

  </table>

  <br>
<h3><center><b>Payment By Paypal</b></center></h3>
<table class="table">
<thead>
    <tr class="success">


    <td width="101">ProductID</td>
    <td width="82">ProductName</td>
    <td width="82">Price</td>
    <td width="79">Qty</td>
    <td width="79">Total</td>
  </tr>
  
 
<?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM orders_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysqli_query($connect,$strSQL2); 

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM Product1 WHERE Productid = '".$objResult2["ProductID"]."' ";
		$objQuery3 = mysqli_query($connect,$strSQL3);
		$objResult3 = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["Qty"] * $objResult3["Price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?php echo $objResult2["ProductID"];?></td>
		<td><?php echo $objResult3["Productname"];?></td>
		<td><?php echo $objResult3["Price"];?></td>
		<td><?php echo $objResult2["Qty"];?></td>
		<td><?php echo number_format($Total,2);?></td>
	  </tr>
	  <?php
 }
  ?>
</table>
<h4><b>Sum Total <?php echo number_format($SumTotal,2);?></b><h4>

<!DOCTYPE html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<body>
<center>
    <div id="paypal-button-container">
    </div>

    <script>
        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:'AWkiWfUVJtpmmpdy2tKnAyrVnGMm1gCHRX2EyIngzWrbtTgY068ao9U19FAcP8ugVZXjbqbchjM3Ffrv'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    
                    payment: {
                        transactions: [
                            {
                                
                                amount: { total: "1000" , currency: 'THB' }
                                
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');

    </script></center>
</body>
</form>

<?php
mysqli_close($connect);
?>
</body>
</html>