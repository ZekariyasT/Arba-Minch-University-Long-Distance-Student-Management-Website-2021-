<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>
AMU-DEMS
</title>
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
    require("menudepthead.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenudepthead.php");
?>
<?php
$dept=$_SESSION['sdc'];
$result1 = mysqli_query($conn,"SELECT * FROM department where Dcode='$dept'");
$row = mysqli_fetch_array($result1);
$dcode=$row['DName'];
?>	
</td><td>
<div id="contentindex500">

		<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	
?>
<?php
if(isset($_POST['view'])){

	$cc=$_POST['cc'];
	$d=$_POST['d'];
	$y=$_POST['y'];
	$id=$_POST['id'];
    $s=$_POST['s'];
    
    $_SESSION['scode']=$cc;
     $_SESSION['sdepartment']=$d;
      $_SESSION['syear']=$y;
       $_SESSION['siid']=$id;
        $_SESSION['ssection']=$s;
    
$query = "select * from course_result where status='posted' and reject=' ' and Department='$d' and uid='$id' and section='$s' and year='$y' and C_Code='$cc'";
$rst=mysqli_query($conn,$sql);


$result = mysqli_query($conn,$query);
$count2=mysqli_num_rows($result);
if($count2>'0')
{
	?>
		<table width="100%">
<td  width="100px" align="center"><a href="#.php"  style="color: #ffffff;font-size: 30px;text-decoration: none;"></a></td>
<td></td><td></td>
<td  bgcolor="#003366" width="120px" align="center"><a href="approve.php"  style="color: #ffffff;font-size: 20px;text-decoration: none;">Approve All</a></td>
<td  bgcolor="#003366" width="120px" align="center"><a rel="facebox" href="rejectcourseresult.php"  style="color: #ffffff;font-size: 20px;text-decoration: none;">Reject All</a></td></table>
<?php
if (!$result) 
{
	$message = 'ERROR:' . mysqli_error();
	return $message;
}
else
{
	$i = 0;
	echo '<form action=" " method=post><table cellpadding="1" cellspacing="1" id="resultTable"><tr>';	
	while ($i < mysqli_num_fields($result))
	{
		$meta = mysqli_fetch_field($result);
		if($meta->name=='status')
		break;
		echo '<th>' . $meta->name . '</th>';
		$i = $i + 1;
	}
	echo '</tr>';
	
	$i = 1;
	while ($row = mysqli_fetch_row($result)) 
	{	
		echo '<tr>';
		$count = count($row);
		$y = 1;
		while ($y < $count)
		{
			$c_row = current($row);
			if($c_row=='posted' || $c_row=='post')
			break;
			echo '<td>' . $c_row . '</td>';
			next($row);
			$y = $y + 1;
		}
	if($row1 = mysqli_fetch_array($rst))
		echo '</tr>';
		$i = $i + 1;
	}
	echo '</table></form>';
	
}
						
?>							 
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}				 

else
echo" No new request";
}
                 ?>
                                        <!-- /block -->
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