<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>AMU-DEMS</title>
<link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon" />
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
    require("menustud.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenustud.php");
?>
	
</td><td>
	<div id="contentindex500">
<form action="1.php"method="POST" >
<table  cellpadding="5" border="0">
<tr><td colspan="2" class="sff"><center>Send feedback Form</center></td></tr>
<tr><td>User Type:</td><td><input type="text" name="ut" id="ut" readonly style="height: 30px;width: 200px;" value="student"/>
</td></tr>
<tr><td> Name:</td><td><input type="text" name="faname" id="faname" style="height: 30px;width: 200px;" required="required" value="<?php echo"".$_SESSION['sfn']."";?>"  placeholder="name" />
<script type="text/javascript">
				    var f1 = new LiveValidation('faname');
				    f1.add(Validate.Presence,{failureMessage: " Please enter  name "});
				     f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only String"});
				 </script> 	
</td></tr>
<tr><td> Email:</td><td><input type="email" name="em" id="emial" style="height: 30px;width: 200px;" required="required"  placeholder="email" />
</td></tr>

<tr><td>Comment:</td><td><textarea  name="feedback" id="feedback"  ROWS="15" COLS="24"  placeholder="Text" wrap="warp" required="" style="height: 100px;width: 200px;text-align: left;"></textarea>
         
       <script type="text/javascript">
				    var f1 = new LiveValidation('feedback');
				    f1.add(Validate.Presence,{failureMessage: " Please enter feedback "});
				     f1.add(Validate.Format,{pattern: /^[0-9a-zA-Z&nbsp; ]+$/ ,failureMessage: " It allows only String"});
				      f1.add( Validate.Length, { minimum: 10, maximum: 10000 } );
				 </script>  	
         </td></tr>
<tr><td></td><td><input type="submit"  name="submit" value="Send" style="height: 30px;width: 100px;"id="m">
<input type="reset"  name="clear" value="Clear" style="height: 30px;width: 100px;"id="m"> </td>
</tr>
	</table>
	</form>
<style type="text/css">
.sff{

	height: 40px;
	width: 170px;
	background-color: #133877;
	color: white;
	margin-top: -5px;
	margin-left: 10px;

}
	#m{
	background-color: #133877;
	color: white;

}
#m:hover{
	background-color: white;
	color: #133877;
}
	
</style>
	 
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
