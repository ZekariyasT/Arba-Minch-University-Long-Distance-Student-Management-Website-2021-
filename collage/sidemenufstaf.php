<div id="sidebar1">
<ul>
<?php
 $id=$_SESSION['suid'];
$s=mysqli_query($conn,"select*from user where UID='$id'");
$rr=mysqli_fetch_array($s);
$cc=$rr['c_code'];
?>
	<div id="sidedate">
	<li><a class="active" href="#.php"> Calendar</a></li>
	 <?php
	 require("../date.php");
	 ?>
	 </div>
</ul>
</div>
