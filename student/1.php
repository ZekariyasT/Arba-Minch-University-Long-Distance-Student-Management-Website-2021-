<?php
include '../connection.php';
session_start();
 $n=$_POST['faname'];
$e=$_POST['em'];
$content=$_POST['feedback'];


$sql="INSERT INTO feed_back(name,email,role,Comment,date) VALUES('$n','$e','student','$content',Now())";
$result=mysqli_query($conn,$sql);
if(!$result)
{
die("<script>alert('Error! your feedback is not sended!');
window.location=\'feedback.php\';</script>" . mysqli_error());
}
else

$x='<script type="text/javascript">alert("Your Information Is Successfully sended !!!");
window.location=\'feedback.php\';</script>';
echo $x;
mysqli_close($conn);
?>