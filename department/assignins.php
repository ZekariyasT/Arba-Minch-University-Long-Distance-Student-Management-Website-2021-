<?php
include '../connection.php';
	$ccode =$_POST["cc"];
	$cname =$_POST["cn"];
	$id =$_POST["In"];
	$dpt =$_POST["dc"];
	$sec =$_POST["sec"];
	$scy =$_POST["scy"];
	$sem =$_POST["sem"];
	$ch =$_POST["ch"];
	$ay =$_POST["ay"];
$d_program1 = mysqli_query($conn,"SELECT * FROM user where UID='$id'");
if($getDprog1 = mysqli_fetch_array($d_program1))
$name = $getDprog1['fname'].'  '.$getDprog1['lname'];

$sq = mysqli_query($conn,"SELECT * FROM assign_instructor where uid='$id' and department='$dpt' and corse_code='$ccode' and cname='$cname' and chour='$ch' and Iname='$name' and section='$sec' and Student_class_year='$scy' and semister='$sem'");
	$c=mysqli_num_rows($sq);
	if($c<='0')
	{
$sql="insert into assign_instructor values(' ','$ccode','$cname','$ch','$id','$name','$dpt','$sec','$scy','$sem','$ay')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
$x='<script type="text/javascript">alert("Error! not Assigned!");
window.location=\'manageinst.php\';</script>';
echo $x;
}
else
{
	if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ipaddress=$http_client_ip;
		}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$ipaddress=$http_x_forwarded_for;	
		}else{
			$ipaddress=$_SERVER['REMOTE_ADDR'];
		}
		session_start();
		
		$uid=$_SESSION['suid'];	
				$result=mysqli_query($conn,"select*from account where UID='$uid'");
				$row=mysqli_fetch_array($result);
				$role=$row['Role'];
				
				$time = time();
			$actual_time = date('d M Y @ H:i:s', $time);
			$user=$_SESSION['suid'];
			$status='yes';
			$logid=2;
			$da=date('y-m-d');
mysqli_query($conn,"INSERT INTO logfile (logid,username,role,status,start_time,activity_type,activity_performed,date,ip_address,end)  VALUES(' ','depthead','Department_Head','$status','$actual_time','Assign course to instructor',concat('uid[','$uid','] ','role[','$role','] ','status[','$status','] '),'$da','$ipaddress','')") or die (mysqli_error());
$x='<script type="text/javascript">alert("Successfully Assigned !!!");
window.location=\'manageinst.php\';</script>';
echo $x;
}
}
else
{
$x='<script type="text/javascript">alert("Alredy Assigned !!!");
window.location=\'manageinst.php\';</script>';
echo $x;
}
?>