
<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>
AMU-DEMS
</title>
<link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../setting.css">
<script type="text/javascript" src="../javascript\date_time.js"></script>
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
  <style>
  hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 3px solid #ca3d24;
    margin: 1em 0;
    padding: 0; 
}
fieldset{
    border: 2px solid #3cb353;
}
.tr{
	background-color: #133877;
	color: white;
	width: 100px;
	height: 30px;
}
.tr:hover{
	background-color: white;
	color: #133877;
	border: 1px solid black;
}
</style>
</head>
<body>
<?php
if(isset($_SESSION['sun'])&& isset($_SESSION['spw'])&& isset($_SESSION['sfn'])&& isset($_SESSION['sln'])&& isset($_SESSION['srole']))
{
?>
<div id="container">
<table><tr><td>
<?php
    require("header.php");
?>
</td></tr><tr><td colspan="3">
<?php
    require("menuins.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenuins.php");
?>
	
</td><td>
	<div id="contentindex500">
				<div id="content" class="clearfix"> 
				<fieldset style="margin-left: -20px;"><legend style="text-align:center">Please Select The Following Field</legend>
				<form action=" " method="post">   
                    <table>
                    <tr>
					<td>Select Department:</td>
                  <td>
					<select name="dpt"  class="login-form2"  style="height:30px; width:180px;" required>
                        <option value="">--select department--</option>
                        <?php
						
						$id=$_SESSION['suid'];
					$d_program = mysqli_query($conn,"SELECT DISTINCT department FROM assign_instructor where uid='$id'");
			
					while($getDprog = mysqli_fetch_array($d_program)){
						$name = $getDprog['department'];
				 ?>
					<option value="<?php echo $name;  ?>"><?php echo $name; ?></option>
				<?php } ?>
                    </select>
                    </td>
                    <td rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td rowspan="3">
					<input type="submit" value="Search"  name="search" class="tr" /></td>
                    </tr>
                   <tr>
					<td>Student Class Year:</td>
                 <td>
					<select name="scy"  class="login-form2"  style="height:30px; width:180px;" required>
                        <option value="">--select Class Year--</option>
                        <?php
					
					$d_program1 = mysqli_query($conn,"SELECT DISTINCT Student_class_year FROM assign_instructor where uid='$id'");
			
					while($getDprog1 = mysqli_fetch_array($d_program1)){
						$scy = $getDprog1['Student_class_year'];
				 ?>
					<option value="<?php echo $scy;  ?>"><?php echo $scy; ?></option>
				<?php } ?>
                    </select>
                    </td>	
					</tr>
					<tr>				    			  
				  <td>Semister:</td>
                  <td>
					<select name="sem"  class="login-form2"  style="height:30px; width:180px;" required>
                        <option value="">--select Semister--</option>
                        <?php
						
					$d_program2 = mysqli_query($conn,"SELECT DISTINCT semister FROM assign_instructor where uid='$id'");
			
					while($getDprog2 = mysqli_fetch_array($d_program2)){
						$sem = $getDprog2['semister'];
				 ?>
					<option value="<?php echo $sem;  ?>"><?php echo $sem; ?></option>
				<?php } ?>
                    </select>
                    </td>
 
 						</tr>
 							<tr>				    			  
				  <td>Course Code:</td>
                  <td>
     <select  name="cc"  class="login-form2" style="height:30px; width:180px;"  required>
      <option selected="selected" value="">Select course code</option>
   <?php
				
					$d_program4 = mysqli_query($conn,"SELECT DISTINCT corse_code FROM assign_instructor where uid='$id'");
			
					while($getDprog4 = mysqli_fetch_array($d_program4)){
						$cc = $getDprog4['corse_code'];
				 ?>
					<option value="<?php echo $cc;  ?>"><?php echo $cc; ?></option>
				<?php } ?>
				    </select>
				    </td>
 
 						</tr>
 						</table>
                 </form>
<?php
if(isset($_POST["search"]) && isset($_POST['dpt']))
{
	$dept=$_POST['dpt'];
	$scy=$_POST['scy'];
	$sem=$_POST['sem'];
	$cc=$_POST['cc'];
							
include('../connection.php');
$result1 = mysqli_query($conn,"SELECT * FROM assignment where department='$dept' and Student_class_year='$scy' and semister='$sem' and status='stud' and ccode='$cc'");
		if($row1 = mysqli_fetch_array($result1)){
			
?>
					<hr>
					<table cellpadding="1" cellspacing="1" id="resultTable" >
						<thead>
							<tr>
							   <th  style="border-left: 1px solid #C1DAD7">Student ID</th>
							    <th  style="border-left: 1px solid #C1DAD7">Asignment<br>Number </th>
								<th  style="border-left: 1px solid #C1DAD7">course<br>code </th>
								<th  style="border-left: 1px solid #C1DAD7">course<br>Name </th>
								<th  style="border-left: 1px solid #C1DAD7">department</th> 
								<th>Student<br>class<br>year</th>
								<th>semister</th>
								<th>Submited<br>date</th>
								<th>file name </th>
								<th>Download</th>
							</tr>
						</thead>
						<tbody>
<?php
$result2 = mysqli_query($conn,"SELECT * FROM assignment where department='$dept' and Student_class_year='$scy' and semister='$sem' and status='stud' and ccode='$cc'");
while($row2 = mysqli_fetch_array($result2))
								{
								$files=$row2['fileName'];
									echo '<tr>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['U_ID'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['asno'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['ccode'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['cname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['department'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['Student_class_year'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['semister'].'</td>';
									echo '<td><div align="right">'.$row2['Submission_date'].'</div></td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row2['fileName'].'</td>';
					print ("<td><font size='3.5'>" ."<a href='../material/assignment/$files'><img width='30' height='30' src='images/d1.jpg' /></a>". "</td>");
									echo '</tr>';	
									}
?>

					</table>
					<?php
					 }
					 else{
					 	echo'<hr>';
					 	 echo"There is No Submitted Assignment";
					 }
					
					}
					?>
					</fieldset>
				</div>
				</div>
</td>
	 
	 </tr>
	 <tr><td >
<?php
include("../footer.php");
?>
</td></tr>

</div>
</table>
<?php
}
else
header("location:../index.php");
?>
</body>
</html>