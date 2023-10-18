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
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
  <style>
  hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 3px solid #ca3d24;
    margin: 1em 0;
    padding: 0; 
}
fieldset{
    border: 2px solid #3cb353;
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
    require("menustud.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenustud.php");
?>
	
</td><td>
	<div id="contentindex500">
<div id="content" class="clearfix"> 
<?php
$uid=$_SESSION['suid'];
$dpt=$_SESSION['sdpt'];
$sem=$_SESSION['ssemister'];
$sec=$_SESSION['ssection'];
$yea=$_SESSION['syear'];
							
include('../connection.php');
$result1 = mysqli_query($conn,"SELECT * FROM assignment where department='$dpt' and Student_class_year='$yea' and semister='$sem'and status='inst' ORDER BY Submission_date DESC");
		if($row1 = mysqli_fetch_array($result1)){
			
?>
					<hr>
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
							<th  style="border-left: 1px solid #C1DAD7">Instructor Name</th>
							    <th  style="border-left: 1px solid #C1DAD7">Assignment<br>Number </th>
							    <th  style="border-left: 1px solid #C1DAD7">Assignment<br>Value</th>
								<th  style="border-left: 1px solid #C1DAD7">course<br>code </th>
								<th  style="border-left: 1px solid #C1DAD7">course<br>Name </th>
								<th  style="border-left: 1px solid #C1DAD7">department</th> 
								<th>Student<br>class<br>year</th>
								<th>semister</th>
								<th>Submission<br>date</th>
								<th>file name </th>
								<th>Download</th>
								
							</tr>
						</thead>
						<tbody>
<?php  
$result11 = mysqli_query($conn,"SELECT * FROM assignment where department='$dpt' and Student_class_year='$yea' and semister='$sem'and status='inst' ORDER BY Submission_date DESC");
while($row2 = mysqli_fetch_array($result11))
								{
$files=$row2['fileName'];

$iid=$row2['U_ID'];
$result12 = mysqli_query($conn,"SELECT * FROM user where UID='$iid'");
$row12 = mysqli_fetch_array($result12);
$fn=$row12['fname'];
$ln=$row12['lname'];
$fnm=$fn.'    '.$ln;

									echo '<tr>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$fnm.'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['asno'].'</td>';
										echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['assignment_value'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['ccode'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['cname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['department'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['Student_class_year'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['semister'].'</td>';
									echo '<td><div align="left">'.$row2['Submission_date'].'</div></td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['fileName'].'</td>';
 print ("<td style='background-color: #243cdb;'><font size='4'>" ."<a style='color:#fffbfb;' href='../material/assignment/$files'><img width='30' height='30' src='userphoto/d1.jpg' /></a>". "</td>");
		
									echo '</tr>';
								}

?>


							
						</tbody>
					</table>
					
					<?php
					 }
					 else
					 {
					 	echo'<hr>';
					 echo"currently not uploaded";
					 }
					 
					
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
header("location:../index.php");
?>
</body>
</html>