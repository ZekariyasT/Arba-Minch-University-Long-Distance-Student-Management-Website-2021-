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
</td></tr><tr><td colspan="2">
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
<?php
if(isset($_POST["search"]) && isset($_POST['dpt']))
{
$dept=$_POST['dpt'];
$_SESSION['idsec']=$dept;
}
$d=$_SESSION['idsec'];
?>
<?php
		include('ps_pagination.php');
	
?>
<form action="" method="post">
<table><tr><td bgcolor="133877" width="100px" align="center"><a href="generateid.php"  style="color: #ffffff;font-size: 22px;text-decoration: none;">Back</a></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td bgcolor="133877" width="auto" align="center">
	<?php
echo'<a style="color: #ffffff;font-size: 15px;text-decoration: none;" href="idgenerate.php?id='.$_SESSION['idsec'].'">Generate ID Number For All Student</a><br>';

?>
</td></tr></table>
<p align="left" style="color: #133877;font-family: time new romans;font-size: 17;">Total Number of record:<?php 
$count_item=mysqli_query($conn,"select * from student where Department='$d' and year='1st' and semister='I'" );
$i=0;
while($row1 = mysqli_fetch_array($count_item)){
$id=$row1["S_ID"]; 
$qu1 = mysqli_query($conn,"select * from entrance_exam where S_ID='$id' and status='satisfactory'");
$row12 = mysqli_fetch_array($qu1);
$idd=$row12["S_ID"];
if($id==$idd){
	$i++;
} 		
}
echo"<font color='red'>".($i)."</font>"; ?></p>					
								<?php
						
$query1 = mysqli_query($conn,"select * from student where Department='$d' and year='1st' and semister='I'");
?>

<?php	
				
$sql = "SELECT * FROM student where Department='$d' and year='1st' and semister='I'ORDER BY section,S_ID ASC";
			
	$rst=mysqli_query($conn,$sql);			
	$count_my_message = mysqli_num_rows($query1);	
if ($count_my_message != '0'){
?>

<table border="1" id="resultTable" width="100%" cellspacing="0" style="margin-left: -20px">
<tr>
<th>S_ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Sex</th>
<th>College</th>
<th>Department</th>
<th>Year</th>
<th>Section</th>
<th>Semister</th>
</tr>
<?php
while($row = mysqli_fetch_array($rst)){	
$id=$row["S_ID"]; 
$qu = mysqli_query($conn,"select * from entrance_exam where S_ID='$id' and status='satisfactory'");
$co=mysqli_num_rows($qu);					
if($co>='1')	
{			
?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["S_ID"]; ?></td>
<td><?php echo $row["FName"]; ?></td>
<td><?php echo $row["mname"]; ?></td>
<td><?php echo $row["Sex"]; ?></td>
<td><?php echo $row["College"]; ?></td>
<td><?php echo $row["Department"]; ?></td>
<td><?php echo $row["year"]; ?></td> 
<td><?php echo $row["section"]; ?></td>  
<td><?php echo $row["semister"]; ?></td> 
</div>		
<?php 
}
}
?>
</tr></table>		
</form>	
								<?php
	echo '<div style="text-align:center">';//.//$pager->renderFullNav().'</div>';
								
								}else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Request found!</div>
								<?php } ?>

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
	