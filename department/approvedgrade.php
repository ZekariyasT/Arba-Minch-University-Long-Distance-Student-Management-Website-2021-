
<?php
include('../connection.php');
session_start();
$dept=$_SESSION['dd'];
$sec=$_SESSION['ss'];
$year=$_SESSION['yy'];

$query3=mysqli_query($conn,"select * from grade where status='approve' and checking='pending' and department='$dept' and year='$year' and section='$sec'");
if($row=mysqli_fetch_assoc($query3))
{

include('../connection.php');
$query1=mysqli_query($conn,"UPDATE grade SET status='approved' where department='$dept' and year='$year' and section='$sec'");
$x='<script type="text/javascript">alert("Succssfully Approved and Posted to Student!!!");
window.location=\'allrequestgr.php\';</script>';
echo $x;
}
else
{
$x='<script type="text/javascript">alert("Already approved");
</script>';
echo $x;	
}


?>