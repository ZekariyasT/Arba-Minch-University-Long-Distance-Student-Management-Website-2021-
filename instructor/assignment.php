<?php
  		include("../connection.php");
  		$destination = "assignment//" . $_FILES["file"]["name"];
  		$uid=$_POST['uid'];
  		$asno=$_POST['asno'];
  		$asv=$_POST['asv'];
  		$ccode=$_POST['cc']; 
		$cname=$_POST['cn'];				
		$dept=$_POST['dc'];	 
		$scyear=$_POST['scy'];	
		$sem=$_POST['sem'];	 
		$sdate=$_POST['date'];		 
		$fileName=$_FILES['file']['name'];
		$tmpName=$_FILES['file']['tmp_name'];
		$fileSize=$_FILES['file']['size'];
		$fileType=$_FILES['file']['type'];
		$query="insert into assignment values(' ','$uid','$asno','$asv','$ccode','$cname','$dept','$scyear','$sem','$sdate','$fileName','$tmpName','$fileSize','$fileType','inst','no')";
		$sql=mysqli_query($conn,$query);
		if($sql)
		{
$x='<script type="text/javascript">alert("Successfully Uploded !!!");
window.location=\'uploadmodule.php\';</script>';
echo $x;
		}
else
			{
die("<script>alert('Error! not Uploded!');
window.location=\'uploadmodule.php\';</script>" . mysqli_error($conn));	   	
			}


?>
 