<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>AMU-DEMS</title>
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
.ps{
   font-size: 16px;
   background-color: #133877;
   color: white;
   border: none;
   width: 100px;
   height: 30px;

}
.ps:hover{
	background-color: white;
	color:#133877; 
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
    require("menustud.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenustud.php");
?>
	
</td><td>
	<div id="contentindex5">

				<div id="content" class="clearfix"> 
				<fieldset style="margin-left: -20px"><legend>Download Module</legend>
				<form action=" " method="post">   
                    <table>
                    <tr>
					<td>Department:</td>
                  <td>
                  
				
                        <?php
						include('../connection.php');
                      $uid=$_SESSION['suid'];
					$d_program = mysqli_query($conn,"SELECT * FROM student where S_ID='$uid'");
					if($getDprog = mysqli_fetch_array($d_program)){
						$name = $getDprog['Department'];
				 ?>
				 <input type="text" name="dpt" value="<?php echo $name;?>" readonly style="height:30px; width:180px;"/>
					
				<?php } ?>
                    
                    </td><td rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td rowspan="3">
		<input type="submit" value="Search" class="ps" name="search"/></td>
                    </tr>
                    <tr>
					<td>Student Class Year:</td>
                  <td>
                <select name="scy"  class="login-form2" style="height:30px; width:180px;" required>
                <option selected="selected" value="">Select Student Class Year</option>
                        <option value="1st">1st</option>
						<option value="2nd">2nd</option>
						<option value="3rd">3rd</option>
						<option value="4th">4th</option>
						<option value="5th">5th</option>
				    </select>
				    </td>	
					</tr>
					<tr>				    			  
				  <td>Semister:</td>
                  <td>
     <select  name="sem"  class="login-form2" style="height:30px; width:180px;"  required>
      <option selected="selected" value="">Select Semister</option>
                        <option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
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
							
include('../connection.php');
$result1 = mysqli_query($conn,"SELECT * FROM course where other_department_takes like '%$dept%' and s_c_year like '%$scy%' and semister='$sem' and status='yes'");
		if($row1 = mysqli_fetch_array($result1)){
			
?>
					<hr>
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7">Module<br>Code </th>
								<th  style="border-left: 1px solid #C1DAD7">Module<br>Name </th>
								<th>Credit<br>Hour</th>
								<th>Student<br>class<br>year</th>
								<th>Semister</th>
							<th style="border-left: 1px solid #C1DAD7">Department</th> 
								<th>Year</th>
								<th>file name </th>
								<th>Download</th>	
								
							</tr>
						</thead>
						<tbody>
<?php
$result2 = mysqli_query($conn,"SELECT * FROM course where other_department_takes like '%$dept%' and s_c_year like '%$scy%' and semister='$sem' and status='yes'");
							while($row0 = mysqli_fetch_array($result2))
								{
									 $files=$row0['FileName'];
									echo '<tr>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['course_code'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['cname'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['chour'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['s_c_year'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['semister'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['department'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['ayear'].'</td>';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row0['FileName'].'</td>';
print ("<td style='background-color: #243cdb;'><font size='4'>" ."<a style='color:#fffbfb;' href='../material/module/$files'><img width='30' height='30' src='userphoto/d1.jpg' /></a>". "</td>");
									echo '</tr>';
								}
								?>
						</tbody>
					</table>
					
					<?php
					 }
					 else
					 {
					 echo'<hr>';
					 echo"Currently not uploaded Module";
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