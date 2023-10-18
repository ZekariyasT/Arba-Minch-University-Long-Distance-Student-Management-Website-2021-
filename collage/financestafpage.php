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
	
</td><td>
	<div id="contentindex500">

	<p style="text-transform:uppercase; font-size: 30px; margin-top: -20px; margin-left: 150px; color:#582f85;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  well come to </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font color=#562CA3>".$_SESSION['sfn']."&nbsp;&nbsp;".$_SESSION['sln']."</font>" ;?>  Page</p>
	<?php
	echo"<img class=po src='".$_SESSION['sphoto']."'width=600px height=500px>";
	?>
	 	
	 </div></td>
	 
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
<style type="text/css">
	.po{
		width: 600px;
		height: 500px;
		position: relative;
	   border: 0px solid white;
	   border-radius: 50%;
	   background-size: 100% 100%;
	   margin-left: 100px;
	}
</style>