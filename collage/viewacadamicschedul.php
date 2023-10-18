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
<?php	

$result = mysqli_query($conn,"SELECT * FROM acadamic_calender WHERE semister='Semister one'");
$result1 = mysqli_query($conn,"SELECT * FROM acadamic_calender WHERE semister='Semister two'");
echo "<table border='1' style='width:590px;' align='center'><font color=white>
<tr>
<th bgcolor='#408c70' colspan='3'><font color='white' size='5'>Semister One</th></tr>
<tr>
<th bgcolor='#336699'><font color='white' size='5'>No</th>
<th bgcolor='#336699'><font color=white size='5'>Dates</th>
<th bgcolor='#336699'><font color=white size='5'>Activities</th>
</tr>";
echo'</font>';
while($row = mysqli_fetch_array($result))
  {
  print ("<tr>");
  print ("<td><font size='2'>" . $row['no'] . "</td>");
 print ("<td><font size='2'>" . $row['dates'] . "</td>");
 print ("<td><font size='2'>" . $row['activities'] . "</td>");
  
print ("</tr>");
  }
echo"<tr>
<th bgcolor='#408c70' colspan='3'><font color='white' size='5'>Semister Two</th></tr>";
while($row1 = mysqli_fetch_array($result1))
  {
  print ("<tr>");
  print ("<td><font size='2'>" . $row1['no'] . "</td>");
 print ("<td><font size='2'>" . $row1['dates'] . "</td>");
 print ("<td><font size='2'>" . $row1['activities'] . "</td>");
  
print ("</tr>");
  }
print( "</table>");

mysqli_close($conn);
?>

</div></td>
	 
	 </tr>
	 <tr><td>
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