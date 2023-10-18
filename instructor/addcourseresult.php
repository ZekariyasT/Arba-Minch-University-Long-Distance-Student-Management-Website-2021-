<?php
session_start();
include("../connection.php");
$idd=$_SESSION['suid'];
?>
<html>
<head>
<title>
AMU-DEMS
</title>
<link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../setting.css">
<script type="text/javascript" src="../javascript\date_time.js"></script>
<script src="js/validation.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
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
    require("menuins.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenuins.php");
?>
	
</td><td>
	<div id="contentindex500">
	
	<form action="insertcourse.php" name="addem" method="post">
	<table cellpadding="1" cellspacing="1" id="resultTable" >
<?php
if(isset($_POST['search']))
	{

	 				$dpt=$_POST['dpt'];
	 				$_SESSION['sdpt']=$dpt;
				    $scy=$_POST['scy'];
				    $_SESSION['sscy']=$scy;
					$sec=$_POST['sec'];
					$_SESSION['ssec']=$sec;
					$sem=$_POST['sem'];
					$_SESSION['ssem']=$sem;
					$cc=$_POST['cc'];
					$_SESSION['scc']=$cc;
				
$sql0=mysqli_query($conn,"select * from course_result where Department='$dpt' and year='$scy' and semister='$sem' and section='$sec' and C_Code='$cc'");
$coun=mysqli_num_rows($sql0);

if($coun>='1'){
	$row=mysqli_fetch_array($sql0);
	$as=$row['Assignment'];
				?>
						<thead>
							<tr>
							   <th  style="border-left: 1px solid #C1DAD7">Student ID</th>
							    <th  style="border-left: 1px solid #C1DAD7">Asignment </th>						      
								<th>Final</th>
							</tr>
						</thead>
						<tbody>
<?php		
$sql00=mysqli_query($conn,"select * from course_result where Department='$dpt' and year='$scy' and semister='$sem' and section='$sec'and C_Code='$cc'");
while($row = mysqli_fetch_array($sql00))
{
		$sid=$row['S_ID'];
			echo '<tr>';
echo '<td style="border-left: 1px solid #C1DAD7;"><input type=text name=id[] readonly value='.$row['S_ID'].' style=width:100px ></td>';

echo '<td style="border-left: 1px solid #C1DAD7;"><input type=text name=a1[]  value='.$row['Assignment'].'  style=width:50px></td>';

echo '<td style="border-left: 1px solid #C1DAD7;"><input type=text  name=f[] id=f1[] required style=width:50px ></td>';
echo '<input type=hidden name=t[] value='.$row['Total'].'';

echo '</tr>';	
}
echo'<tr><td></td><td colspan="3"><input type="submit"  name="submit2"  style="width:100px;hight:30px;background-color: #133877; color: white" value="Add"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset"   style="width:100px;hight:30px; background-color: #133877; color: white" value="Clear"/></td></tr>';
?>
<script type="text/javascript">
				    var f1 = new LiveValidation('f1[]');
				    f1.add(Validate.Presence,{failureMessage: " Please enter assignment value"});
				     f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: " It allows only Number"});
				 </script>
				 <?php
}
else{
				?>
						<thead>
							<tr>
							   <th  style="border-left: 1px solid #C1DAD7">Student ID</th>
							    <th  style="border-left: 1px solid #C1DAD7">Asignment </th>
							    <th>Final</th>
							</tr>
						</thead>
						<tbody>
<?php		
$sql=mysqli_query($conn,"select * from student where Department='$dpt' and year='$scy' and semister='$sem' and section='$sec'");
while($row = mysqli_fetch_array($sql))
{
		$sid=$row['S_ID'];
			echo '<tr>';
echo '<td style="border-left: 1px solid #C1DAD7;"><input type=text name=id[] readonly value='.$row['S_ID'].' style=width:100px></td>';
echo '<input type=hidden name=cc[] value='.$cc.'>';
			echo '<td style="border-left: 1px solid #C1DAD7;"><input type=text required name=a1[] id=a1[] style=width:50px></td>';
			echo '<td style="border-left: 1px solid #C1DAD7;"><input type=number readonly name=f[] style=width:50px></td></tr>';
?>
<script type="text/javascript">
				    var f1 = new LiveValidation('a1[]');
				    f1.add(Validate.Presence,{failureMessage: " Please enter assignment value"});
				     f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: " It allows only Number"});
				 </script>
				 <?php
}
?>
				 
<tr><td></td><td colspan="3">
	<input type="submit"  name="submit1"  style="background-color: #133877; width: 100px;height:30px;color: white;"value="Add"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" style="background-color: #133877; width: 100px;height: 30px; color: white" value="Clear"/></td></tr>
<?php
}
}	
?>

</tbody>
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