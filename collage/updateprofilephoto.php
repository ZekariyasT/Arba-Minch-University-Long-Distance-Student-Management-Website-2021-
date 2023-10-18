<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>
AMU-DEMS
</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<form action="updatephoto.php" method="POST" name="form1" enctype="multipart/form-data">
<table bgcolor="#f9fbf9" cellpadding="5" border="0">
	<div class="p1">
		<input type="file" class="pp" name="photo" required>
		<?php
echo("<img src='".$_SESSION['sphoto']."'>");?>
	
</div>
<tr><td></td><td><input type="submit" id="submit" name="submit" style="height: 30px; width: 100px; " value="Update">
<input type="reset" id="submit" name="validation" style="height: 30px; width: 100px;margin-left: 15px;" value="CANCEL"size="20" >
</td></tr>

</table>
</form>
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
	.p1{

		height: 300px;
		width: 320px;
		position: relative;
	    border: 2px solid blue;
	    border-radius: 50%;
	    padding-left: 5px;
	    margin-left: 150px;
	    overflow: hidden;
	
	}
	.p1 img{
		width: 320px;
		height: 300px;
		object-fit: cover;
		background-size: 100%;

	}
	.pp{
		position: absolute;
		bottom: 0px;
		outline: none;
		color: transparent;
		width: 100%;
		box-sizing: border-box;
		padding: 20px 120px;
		cursor: pointer;
		transition: 0.5s;
		background: rgba(0, 0, 0, 0.5);
		opacity: 0;

	}
	.pp::-webkit-file-upload-button{
		visibility: hidden;
	}
	.pp::before{
		content: '\f030';
		font-family: fontAwesome;
		font-size: 50px;
		color: #fff;
		display: inline-block;
		-webkit-user-select: none;
	}
	.pp::after{
		content: 'update';
		font-family: sans-serif;
		font-weight: bold;
		color: white;
		display: block;
		top: 70px;
		font-size: 14px;
		position: absolute;
	}
	.pp:hover{
		opacity: 1;
	}
	#submit{
		background-color:#133877;
		border: 0px;
		color: #fff;
		text-align: center;
		margin-left: 190px;
		margin-top: 10px;
		cursor: pointer;
		font-size: 16px;

	}
	#submit:hover{
		background-color:white;
		color: #133877;
		font-weight: bold;

	}
	
</style>