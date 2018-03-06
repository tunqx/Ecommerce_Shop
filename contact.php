<html>
<head>
<title>The Bag</title>
</head>
<body>
<?php
	$strTo = $_POST["txtTo"];
	$strSubject = $_POST["subject"];
	$strHeader = "Content-type: text/html; charset=windows-874\r\n"; // or UTF-8 //
	$strHeader .= "From: ".$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\r\nReply-To: ".$_POST["txtFormEmail"]."";
	$strMessage = nl2br($_POST["txtDescription"]);
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		echo "Email Sending.";
	}
	else
	{
		echo "Email Can Not Send.";
	}
?>
</body>
</html>



