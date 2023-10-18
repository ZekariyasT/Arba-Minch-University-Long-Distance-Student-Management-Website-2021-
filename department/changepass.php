<style type="text/css">
#btn{
		background-color:#133877;
		border: 0px;
		color: #fff;
		text-align: center;
		margin-left: 200px;
		margin-top: 10px;
		cursor: pointer;
		font-size: 16px;

	}
	#btn:hover{
		background-color:white;
		color: #133877;
		font-weight: bold;
		border: 1px solid black;

	}
	</style>
<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>
AMU-DEMS
</title>
<link rel="shortcut icon" href="../images/distance.jpg" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../setting.css">
<script type="text/javascript" src="../javascript\date_time.js"></script>

</head>
<body>
<?php
if(isset($_SESSION['sun'])&& isset($_SESSION['spw'])&& isset($_SESSION['sfn'])&& isset($_SESSION['sln'])&& isset($_SESSION['srole']))
{
?>
<div id="container">

<table><tr><td>
<?php
    require("header.php");
?>
</td></tr><tr><td colspan="3">
<?php
    require("menudepthead.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenudepthead.php");
?>
	
</td><td>
	<div id="contentindex500">
<form action="uaccounta.php" method="POST"  onsubmit='return validate()'>
<table bgcolor="#f9fbf9" cellpadding="12" border="0">
<tr><td colspan="2" ><center><h1 style="color: white;  padding-left: 65px;padding-right: 80px; width: 300px; background-color: #133877; margin-left:140px;" ><b>Change Password
</b></h1></center></td></tr>
<tr><td style=" padding-left: 150px; font-size: 22px;">Old Password:</td><td><input type="password" id="password" name="opass" required="required"  placeholder="old_password" style="height: 40px; padding-left: 10px; font-size:20px" /></td></tr>
<tr><td style=" padding-left: 150px; font-size: 22px;">New Password:</td><td><input type="password" id="password" name="npass"required="required"  placeholder="new_password" style="height: 40px; padding-left: 10px; font-size:20px"/></td></tr>
 <tr><td style=" padding-left: 150px; font-size: 22px;">Confirm Password:</td><td><input type="password" id="password" name="rnpass" required="required"  placeholder="confirm_password" style="height: 40px; padding-left: 10px; font-size:20px"/></td></tr>
 <tr><td><input type="submit" id="btn" name="submit" value="CHANGE"size="20" style="height: 30px;width: 100px; margin-right: -200px; "></td><td>
<input type="reset" id="btn" name="validate" value="RESET"size="20" style="height: 30px;width: 100px; margin-left: 15px;"></td></tr>
</table>
</form>

</div>

</td>
	 
	 </tr>
	 <tr><td >
<?php
include("../footer.php");
?>
</td></tr>

</div>
</table>
<?php
}
else
header("location:../index.php");
?>
</body>
</html>