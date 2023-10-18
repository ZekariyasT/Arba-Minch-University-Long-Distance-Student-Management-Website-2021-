
<?php
	include('../connection.php');

$query3=mysqli_query($conn,"select * from student where unread=' '");
if($row=mysqli_fetch_assoc($query3))
{
$query1=mysqli_query($conn,"UPDATE student SET unread='no' where unread=' '");
$x='<script type="text/javascript">alert("Succssfully Send !!!");
window.location=\'studentlist.php\';</script>';
echo $x;
}
else
{
$x='<script type="text/javascript">alert("Alredy Send");
window.location=\'studentlist.php\';</script>';
echo $x;	
}


?>