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
<script type="text/javascript" src="../javascript/date_time.js"></script>
<style type="text/css">
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
padding:5px;
background-color:#133877;
color: white;
height: 30px;
width: 100px;
}
#button1:hover{
	background-color: white;
	color: #133877;
	border: 1px solid black;
}

</style>
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
    require("menuro.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenuro.php");
?>
	
</td><td>
	<div id="contentindex500">
<form action="addcalender.php" method="post" >
<u><b>AMU Continuing and Distance Education
Acadamic Calander for Distance Students
</b></u>
<br><fieldset>
<table  cellpadding="5" border="0">
<tr><td>Select Semister</td>
<td>
 <select name="semister" required class="ed">
    <option value="" selected>Select Semister</option>
	<option value="Semister one">Semister one</option>
	<option value="Semister Two">Semister Two</option>

	
</select> <br><br></td></tr>

<tr><td>Dates:</td><td>
<textarea rows="5" cols="40" name="date" required class="ed">
	
	
</textarea>
 	
</td></tr>

<tr><td>Activitis:</td><td>
<textarea rows="8" cols="40" name="activ" required class="ed">
	
	
</textarea>
</td></tr>
 
<tr><td></td>
<td><input type="submit"  name="submit" value="Prepare" style="margin-left: 20px; height: 30px;width: 100px;"id="button1">
<input type="reset"  name="clear" value="Clear" style="margin-left: 20px; height: 30px;width: 100px;"id="button1"> </td>

</tr>
</table></fieldset>
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