<?php
	session_start();
	require_once("connect.php");

	$strSQL = "SELECT * FROM member WHERE Email = '".mysqli_real_escape_string($connect,$_POST['txtEmail'])."' 
	and Password = '".mysqli_real_escape_string($connect,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($connect,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Email and Password Incorrect!";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysqli_close($connect);
?>