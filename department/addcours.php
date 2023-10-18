  	<?php
include("../connection.php");
?>	
  		<?php
		
class Module{
			var $con;
			var $query;
			var $res;
			var $destination;
			var $ccode;
			var  $cname;
			var  $ch;
			var $ayear;
			var $dept;
			var $year;
			var $sem;
			var $fileName;
			var $tmpName;
			var $fileSize;
			var $fileType;
			
function connects()
{
			$this->con=mysqli_connect("localhost","root","" ,"cde");
}
function query()
{

				$this->ccode=$_POST['cd'];
				$this->cname=$_POST['cn'];	
				$this->ch=$_POST['ch'];
				$this->ayear=$_POST['ayear'];	 
				$this->dept=$_POST['dc'];
$this->query="insert into course(course_code,cname,chour,ayear,department) values('$this->ccode','$this->cname','$this->ch','$this->ayear','$this->dept')";
				$this->res=mysqli_query($this->con,$this->query);
    }
function display()
{
			if(mysqli_affected_rows($this->con)==1)
			{
if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		$ipaddress=$http_client_ip;
		}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		$ipaddress=$http_x_forwarded_for;	
		}else{
			$ipaddress=$_SERVER['REMOTE_ADDR'];
		}
		session_start();
		include("../connection.php");
		
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
mysqli_query($conn,"INSERT INTO logfile (logid,username,role,status,start_time,activity_type,activity_performed,date,ip_address,end)  VALUES(' ','depthead','Department_Head','$status','$actual_time','Add course',concat('uid[','$uid','] ','role[','$role','] ','status[','$status','] '),'$da','$ipaddress','')");

$x='<script type="text/javascript">alert("Successfully Registerd !!!");
window.location=\'managecourse.php\';</script>';
echo $x;
			}
			else
			{
die("<script>alert('Error! not registerd!');
window.location=\'managecourse.php\';</script>" . mysqli_error($this->con));	   	
			}
			}
}
$Mod=new Module();
$Mod->connects();
$Mod->query();
$Mod->display();
?>