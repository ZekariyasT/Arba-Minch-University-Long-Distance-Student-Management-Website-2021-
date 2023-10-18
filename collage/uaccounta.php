<?php
session_start();
include("../connection.php");
 $dd=$_SESSION['suid'];
if(isset($_POST['submit']))
			  {
	          $opass=$_POST['opass'];
			  $npass=$_POST['npass'];
			  $rnpass=$_POST['rnpass'];
			  if(empty($opass)||empty($npass)||empty($rnpass)){
			echo"invalid password";
			}
	 $sql="select * from account WHERE UID='$dd'";
	     $result = mysqli_query($conn,$sql);
       $records = mysqli_num_rows($result);
       $myrow = mysqli_fetch_array($result);
       $staa=$myrow['Password'];
			  $ps=$staa;
			  if($npass==$rnpass)
			  {
			  	if($ps==$opass){
			  		    	if($rnpass==$ps){
echo '<script type="text/javascript">alert("the old password not used as the new password!");
window.location=\'changepass.php\';</script>';
				}
				else
				 {
		$sql="update account set Password='$npass' WHERE UID='$dd'";
			  
			 if( mysqli_query($conn,$sql)){
echo '<script type="text/javascript">alert("password changed sucessfull!");
window.location=\'changepass.php\';</script>';
			  }
			  }}
			  else{
echo '<script type="text/javascript">alert("old password is incorrect");
window.location=\'changepass.php\';</script>';
			  }
			    if(!$sql){
			  	echo '<script type="text/javascript">alert("old password is incorrect");
window.location=\'changepass.php\';</script>';
			  }
			  }
			  else{
echo '<script type="text/javascript">alert("password not mached");
window.location=\'changepass.php\';</script>';
			  }
}
echo mysql_error();
?>