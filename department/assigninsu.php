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
						{
						$name = $getDprog1['fname'].'  '.$getDprog1['lname'];
}
$sql="update assign_instructor set uid='$id',Iname='$name',department='$dpt',section='$sec',Student_class_year='$scy',semister='$sem' where corse_code='$ccode'";
$result=mysqli_query($conn,$sql);
if(!$result)
{
$x='<script type="text/javascript">alert("Error! not updated!");
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
$x='<script type="text/javascript">alert("Successfully updated !!!");
window.location=\'manageinst.php\';</script>';
echo $x;
}
mysqli_close($conn);
?>