

<?php
session_start();
include("../connection.php");
$dept=$_GET['id'];
$query1 = mysqli_query($conn,"select * from student where Department='$dept' and year='1st' and semister='I' and section=' ' and status=' ' ORDER BY section,FName ASC")or die(mysqli_error());
$count=mysqli_num_rows($query1);

if($count>='1')
{
$aa=mysqli_query($conn,"SELECT * FROM student where Department='$dept' ORDER BY S_ID DESC LIMIT 1");
	$t=mysqli_fetch_array($aa);
	$b=$t['S_ID'];
		$x ='ACC/';
		$x1 ='LAW/';
		$x2 ='MNGT/';
		$x3 ='ECNS/';
		$d=date('y');
		$dd=$d-8;
		function add_nol($number,$add_nol) {
		   while (strlen($number)<$add_nol) {
		       $number = "0".$number;
		   }
		   return $number;
		}
		for($y=1;$y<=$count;$y++){

	     	if($dept=='Accounting')
			$id=$x."".add_nol($y,4).'/'.$dd;
			else if($dept=='law')
			$id=$x1."".add_nol($y,4).'/'.$dd;
			else if($dept=='Economics')
			$id=$x3."".add_nol($y,4).'/'.$dd;
			else if($dept=='managment')
			$id=$x2."".add_nol($y,4).'/'.$dd;
			
			if($row=mysqli_fetch_array($query1))
			{
				$no=$row['S_ID'];
$qu = mysqli_query($conn,"select * from entrance_exam where S_ID='$no' and status='satisfactory'");
$co=mysqli_num_rows($qu);					
if($co>='1')	
{
$update0=mysqli_query($conn,"update entrance_exam set S_ID='$id' where S_ID='$no'");				
$update=mysqli_query($conn,"update student set S_ID='$id',status='ok' where S_ID='$no'");
$update1=mysqli_query($conn,"update user set UID='$id' where UID='$no'");
$q = mysqli_query($conn,"select * from user where UID='$id'");
		$rr=mysqli_fetch_array($q);
		$sid=$rr['UID'];
$update2=mysqli_query($conn,"update account set UID='$id' where UID='$sid'");
			
}
			}
		}	
		$update=mysqli_query($conn,"update student set S_ID='$id',status='ok' where S_ID='$no'");
		if($update)
		{
$x='<script type="text/javascript">alert("Succssfully Generated !!!");
window.location=\'generateclass.php\';</script>';
echo $x;	
		}

}
else
{
$x='<script type="text/javascript">alert("Alredy Generated !!!");
window.location=\'generateclass.php\';</script>';
echo $x;
}

?>
