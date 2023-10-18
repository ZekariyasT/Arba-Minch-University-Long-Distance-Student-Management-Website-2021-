<?php
include '../connection.php';
include("registrarpage.php");
$semister=$_POST['semister'];
$date=$_POST['date'];
$activ=$_POST['activ'];

$sql="INSERT INTO acadamic_calender VALUES('','$semister','$date','$activ')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
die("<script>alert('Error! not registerd!');
window.location=\'acadamic_calender.php\';</script>" . mysqli_error());
}
else
{
$x='<script type="text/javascript">alert("Your Information Is Successfully Registerd !!!");
window.location=\'acadamic_calender.php\';</script>';
echo $x;
}
mysqli_close($conn);
?>