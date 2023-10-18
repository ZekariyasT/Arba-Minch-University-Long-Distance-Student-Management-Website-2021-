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
    require("menudepthead.php");
?>
</td></tr>
<tr><td>
<?php
	 require("sidemenudepthead.php");
?>
	
</td><td>
	<div id="contentindex5">

<div style="height:500px; width:500px; ">
<section id="contact">
 <h3 class="slanted">Contact Me</h3>
      
	 <h4 style="text-align:center;">Section&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B</h4>
	
	  <table width="430px" height="320px" border="4" cellspacing="8" cellpadding="8"  style="text-align:left;color:black;">
						<font align="center"><i><h4>GROUP 5 MEMBERS LIST</h4></i></font>
						<tr bgcolor="#80998e;">
							<td>ID Number</td>
							<td>Name</td>
							<td>Sex</td>
							<td>E-Mail</td>
							<td>Photo</td>
						</tr>
						<tr>
							<td allign="center">EAMIT/2179/10</td>
							<td allign="center">Yirga Tafere</td>
							<td allign="center">M</td>
							<td>yirgatafe2010@gmail.com</td>
							<td><img src="userphoto/y.jpg" height="50" width="100%"></td>
						</tr>
						<tr>
							<td allign="center">EAMIT/2162/10</td>
							<td allign="center">Temesgen Urgamo</td>
						    <td allign="center">M</td>
						    <td>temesgenurgamo@gmail.com </td>
							<td><img src="userphoto/te.jpg" height="50" width="100%"></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2158/10</td>
							<td allign="center">Tarku Abota</td>
							<td allign="center">M</td>
							<td>Tareabota@gmail.com </td>
							<td><img src="userphoto/n.jpg" height="50" width="100%"></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2144/10</td>
							<td allign="center">Nebiyu Dubale</td>
							<td allign="center">M</td>
							<td>nebiyudu2112@gmail.com</td>
							<td><img src="userphoto/t.jpg" height="50" width="100%"></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2044/10</td>
							<td allign="center">Fasil Mamo</td>
							<td allign="center">M</td>
							<td>Fasilmamo.ethiopian@gmail.com </td>
							<td><img src="userphoto/f.jpg" height="50" width="100%"></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2146/10</td>
							<td allign="center">Neway Dubale</td>
							<td allign="center">M</td>
							<td>newaytkd@gmail.com </td>
							<td><img src="userphoto/ne.jpg" height="50" width="100%"></td>
							
						</tr>
					</table>
			</section>
</div>

	 	
	 </div></td>
	 <td>
	 <div id="siderightindexphoto">
	 <div id="siderightindexphoto1">
	 User Profile
	 </div>
	 
		
	 <?php
echo "<b><br><font color=blue>Welcome:</font><font color=#e22c0c>(".$_SESSION['sfn']."&nbsp;&nbsp;&nbsp;".$_SESSION['sln'].")</font></b><b><br><img src='".$_SESSION['sphoto']."'width=180px height=160px></b>"; 
?>
<div id="sidebarr">
<ul>
 <li><a href="updateprofilephoto.php">Change Photo</a></li>
<li><a href="changepass.php">Change password</a></li>
	 </ul>
</div>
	 </div>
	 <div id="siderightindexadational">
	 <div id="siderightindexadational1">
	 Another link 
	 </div>
	 <div id="siderightindexadational12">
	 <table>
	 <tr><td><div id="facebook"></div></td><td>
	<p><a href="https://www.facebook.com/" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Facebook</a><p></td></tr>
	<tr><td><div id="twitter"></div></td><td><p><a href="https://www.twitter.com/" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Twitter</a></p></td></tr>
	<tr><td><div id="you"></div></td><td><p><a href="https://www.youtube.com/" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Youtube</a></p></td></tr>
	<tr><td><div id="googleplus"></div></td><td><p><a href="https://plus.google.com/" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;Google++</a></p></td></tr></table>
	</div>
	 </div>
	  </td>
	 </tr>
	 <tr><td>
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