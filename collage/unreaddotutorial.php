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
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	
$id=$_SESSION['suid'];
$s=mysqli_query($conn,"select*from user where UID='$id'");
$rr=mysqli_fetch_array($s);
$cc=$rr['c_code'];

?>
<form action="" method="post">									
<?php
$query = mysqli_query($conn,"select * from payment_table where unread='no' and status=' ' and type='tutorial' and c_code='$cc'")
or die(mysqli_error());
$coun = mysqli_num_rows($query);
?>		
										
<a href="unreaddotutorial.php"><i class="icon-check"></i><font size="4px"> Unseen Request[&nbsp;<?php echo $coun?>&nbsp;]</font></a>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
<a href="messageddotutorial.php"><i class="icon-envelope-alt"></i><font size="4px">Seen Request</font></a>
										
									<font size="3px">
<?php
$sql = "select * from payment_table where unread='no' and status=' ' and type='tutorial' and c_code='$cc'";
	 $rst=mysqli_query($conn,$sql);
	//Create a PS_Pagination object
	$pager = new PS_Pagination($conn, $sql, 10, 1);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysqli_query($conn,"select * from payment_table where unread='no' and status=' ' and type='tutorial' and c_code='$cc'")
or die(mysqli_error());
$count = mysqli_num_rows($query1);	
if ($count != '0'){?>
<table border="1" id="resultTable" cellspacing="0" style="margin-left: -20px;">
<tr bgcolor="#CAE8EA">
<th rowspan="2">No</th>
<th rowspan="2">Sender<br>UID</th>
<th rowspan="2">Tutors<br>Name</th>
<th rowspan="2">Rank</th>
<th rowspan="2">Course<br>he/she<br>tutored</th>
<th rowspan="2">Cr<br>Hr</th>
<th colspan="3">Students Who have taken the course</th>
<th rowspan="2">No_of<br>hours<br>she/he<br>gave<br>tutorial</th>
<th rowspan="2">Action</th>
</tr>
<tr bgcolor="#CAE8EA">
<th>Department</th>
<th>Year</th>
<th>Section</th>	
	
</tr>
        <?php
while($row = mysqli_fetch_array($rst)){	
$id=$row["no"]; 
						 
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["no"]; ?></td>
<td><?php echo $row["UID"]; ?></td>
<td><?php echo $row["Instructors_Name"]; ?></td>
<td><?php echo $row["Rank"]; ?></td>
<td><?php echo $row["Course_Code"]; ?></td>
<td><?php echo $row["CrHr"]; ?></td>
<td><?php echo $row["Department"]; ?></td>
<td><?php echo $row["Year"]; ?></td>
<td><?php echo $row["Section"]; ?></td>
<td><?php echo $row["No_of_hours_she_he_gave_tutorial"]; ?></td>										
											
	<?php }
	?>
	<td rowspan="<?php echo $count; ?>"><?php echo '<a  href="offeringtutorial.php">Send All To CDEO</a>';?></td>
	</div></tr></table>

	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Request found!</div>
								<?php } ?>
										
								</form>		
                               
                        <!-- /block -->
                   
 </div>
  </td>
		 
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