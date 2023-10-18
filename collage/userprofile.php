<style type="text/css">
	.pp{
		width: 80px;
		height: 60px;
	 position: relative;
	   border: 5px solid white;
	   border-radius: 50%;
	   background-size: 100% 100%;
	   margin-left: 7px;
	  

	}
	.t{
		color: #000404;
		font-size: 20px;
		text-transform: uppercase;
		text-align: center;

	}
	.tt{
		font-size: 20px;
		text-decoration: underline;
		font-family: italic sans-serif;
		color: #562CA3

	}
	.ty{ 
		position: relative;
		width: 400px;
		height: 500px;
		background-color: white;
		align-content: center;
		margin-left: 155px;
		margin-top: 00px;
	}
	.pt{
        width: 180px;
		height: 160px;
	    position: relative;
	    border: 5px solid white;
	    border-radius: 50%;
	    margin-left: 80px;
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
    require("menufstaf.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenufstaf.php");
?>
	
</td>
<td >
	<div id="contentindex500">
	
		<div class="ty">
	 <?php
echo "<b><img class=pt src='".$_SESSION['sphoto']."'width=180px height=160px border=1px ></b><b>&nbsp;&nbsp;&nbsp;<p class=t color=#000404>Name: <font color=#562CA3>".$_SESSION['sfn']."&nbsp;&nbsp;".$_SESSION['sln']."</font><br></p>
    <p class=t color=#000404>sex: <font color=#562CA3>".$_SESSION['sex']."</font><br></p>
    <p class=t color=#000404>Role: <font color=#562CA3>".$_SESSION['srole']."</font><br></p>
    <p class=t color=#000404>Email: <font class=tt color=#562CA3 >".$_SESSION['email']."</font><br></p>
    <p class=t color=#000404>phone: <font class=tt color=#562CA3> +".$_SESSION['phon']."</font><br></p>
   </b>"; 
?>

</div>
	
	
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
header("location:../index2.php");
?>
</body>
</html>