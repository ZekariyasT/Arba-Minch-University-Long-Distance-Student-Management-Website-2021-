<?php
session_start();
require('../connection.php');
$dept=$_SESSION['sdc'];
$result1 = mysqli_query($conn,"SELECT * FROM department where Dcode='$dept'");
$row = mysqli_fetch_array($result1);
$dcode=$row['DName'];
?>
<style type="text/css">
.ed{
border-style:solid;
border-width:thin;
border-color:#133877;
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
<form action="addcours.php"  method="post" enctype="multipart/form-data"  onSubmit="return validate(this);">
<table  cellpadding="5" border="0">
<tr><td colspan="2" style="height:40px; width:300px; padding: 10px; background-color:#133877;color:white;"><center >Course registration Form</center></td></tr>


<tr><td>Course Code:</td><td><input type="text" class="ed" name="cd" id="cd" style="height:30px; width:180px;"required="required"  placeholder="please enter course code" />
<script type="text/javascript">
				    var f1 = new LiveValidation('cd');
				    f1.add(Validate.Presence,{failureMessage: " please enter course code"});
				     f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: " It allows only String and Number"});
				 </script> 	
</td></tr>
<tr><td>Course Title:</td><td><input type="text" class="ed" name="cn" id="cn" style="height:30px; width:180px;" required="required"  placeholder="please enter course Title" />
<script type="text/javascript">
				    var f1 = new LiveValidation('cn');
				    f1.add(Validate.Presence,{failureMessage: "please enter course Title "});
				     f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " It allows only String"});
				 </script> 	
</td></tr>


<tr><td>Creadit Hour:</td><td><input type="text" name="ch" id="ch" class="ed" style="height:30px; width:180px;" required="required"  placeholder="please enter credit hour" />
<script type="text/javascript">
				    var f1 = new LiveValidation('ch');
				    f1.add(Validate.Presence,{failureMessage: " Please enter credit hour"});
				     f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: " It allows only number"});
				 </script> 	
</td></tr>

<tr><td>department:</td><td><input type="text" class="ed" name="dc" readonly style="height:30px; width:180px;color:red;" required value="<?php echo $dcode ?>"/>

</td></tr>

<tr><td> Year:</td><td>
<select name="ayear" required style="height:30px; width:180px;" class="ed">
   <option>---select Year---</option>
	<option value=2014>2014</option>
	<option value=2015>2015</option>
	<option value=2016>2016</option>
	<option value=2017>2017</option>
	<option value=2018>2018</option>
	
</select>	
</td></tr>


<tr><td></td>
<td><input type="submit"  name="submit" value="Register" id="button1">
<input type="reset"  name="clear" value="Clear" id="button1"> </td>

</tr>
</table>
</form>
	
	