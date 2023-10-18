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
    border: 1px solid #3cb353;
    cursor: pointer;
}
legend:hover{
	background-color: white;
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
				 
				<fieldset style="margin-left: -20px"><legend style="text-align:center;width: 300px; height:30px; background-color:#133877; color: white; padding-bottom: 10px;">Submit Assignment</legend>
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
								<th  style="border-left: 1px solid #C1DAD7">course<br>code </th>
								<th  style="border-left: 1px solid #C1DAD7">course<br>Name </th>
								<th  style="border-left: 1px solid #C1DAD7">department</th> 
								<th>Student<br>class<br>year</th>
								<th>semister</th>
								<th>Submission<br>date</th>
								<th>file name </th>
								<th>Upload</th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('../connection.php');
$result = mysqli_query($conn,"SELECT * FROM assignment where department='$dpt' and Student_class_year='$yea' and semister='$sem'and status='inst' ORDER BY Submission_date DESC");
							while($row = mysqli_fetch_array($result))
								{
						            $files=$row['fileName'];
						            $iid=$row['U_ID'];
$result1 = mysqli_query($conn,"SELECT * FROM user where UID='$iid'");
$row1 = mysqli_fetch_array($result1);
$fn=$row1['fname'];
$ln=$row1['lname'];
$fnm=$fn.'    '.$ln;

									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$fnm.'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['asno'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['ccode'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['cname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['department'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['Student_class_year'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['semister'].'</td>';
									echo '<td><div align="left">'.$row['Submission_date'].'</div></td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['fileName'].'</td>';
echo '<td style="background-color: #243cdb;"><div align="center"><a style="color:#fffbfb;size=4" rel="facebox" href="uploadassignment.php?id='.$row['no'].'">Upload</a></div></td>';
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
					</fieldset>
				
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