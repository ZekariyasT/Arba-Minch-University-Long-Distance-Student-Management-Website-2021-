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

		<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
	
?>
<?php	
$query = "select * from course_result where status='not' and uid='$idd'";
$rst=mysqli_query($conn,$sql);
	$pager = new PS_Pagination($conn, $query, 5, 1);
	$rs = $pager->paginate();

$result = mysqli_query($conn,$query);
$c=mysqli_num_rows($result);
if ($c==0) 
{
echo" No new Request";
}
else
{
	$query1 = "select * from course_result where status='not' and uid='$idd'";
	$result1 = mysqli_query($conn,$query1);
	$r=mysqli_fetch_array($result1);
	$re=$r['reject'];
	echo'	<table width="100%">

<td>Because of</td><td>'.$re.'</td>
<td  bgcolor="#003366" width="120px" align="center"><a href="sendallrequest.php"  style="color: #ffffff;font-size: 20px;text-decoration: none;">Send All</a></td></table>';
	$i = 0;
	echo '<form action=" " method=post><table cellpadding="1" cellspacing="1" id="resultTable" style=margin-left:-25px;><tr>';	
	while ($i < mysqli_num_fields($result))
	{
		$meta = mysqli_fetch_field($result);
		if($meta->name=='status')
		break;
		echo '<th>' . $meta->name . '</th>';
		$i = $i + 1;
	}
	echo '<th>Action </th></tr>';
	
	$i = 0;
	while ($row = mysqli_fetch_row($result)) 
	{	
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$c_row = current($row);
			if($c_row=='approved' || $c_row=='post'|| $c_row=='posted' || $c_row=='not')
			break;
			echo '<td>' . $c_row . '</td>';
			next($row);
			$y = $y + 1;
		}
	if($row1 = mysqli_fetch_array($rst))
		echo '<td><a rel="facebox" href="calculategradeu.php?id='.$row1["no"].'">Update</a></td></tr>';
		$i = $i + 1;
	}
	echo '</table></form>';
	
}
						
?>
							 
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
				 

                 ?>
                                        <!-- /block -->
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
