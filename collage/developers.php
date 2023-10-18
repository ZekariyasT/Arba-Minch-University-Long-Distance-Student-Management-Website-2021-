<?php
session_start();
include("../connection.php");
?>
<html>
<head>
<title>
AMU-DEMS
</title>
<link rel="shortcut icon" href="../images/distance.jpg" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../setting.css">
<script type="text/javascript" src="javascript\date_time.js"></script>

</head>
<body>
<div id="container">

<table><tr><td>
<?php
    require("header.php");
?>
</td></tr><tr><td colspan="2">
<?php
    require("menufstaf.php");
?>
</td></tr>
<tr><td>
<?php
		include("sidemenufstaf.php");
	?>				

</td><td>
	<div id="contentindex500">
<div style="height:500px; width:500px; ">
<section id="contact">
 <h3 class="slanted" style="margin-top: -60px;">Contact Me</h3>
      
	 <h3 style="text-align:center; margin-top: -65px; margin-left:-130px">Section&nbsp;&nbsp;&nbsp;&nbsp;B</h3>
	
	  <table width="730px" height="320px" border="4" cellspacing="8" cellpadding="8"  style="text-align:left;color:black;">
						<font align="center"><i><h4 style="margin-top:-65px; margin-left: 250px;">GROUP 5 MEMBERS LIST</h4></i></font>
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
							<td><marquee direction="right"><img src="../images/y.jpg" height="50" width="100%"></marquee></td>
						</tr>
						<tr>
							<td allign="center">EAMIT/2162/10</td>
							<td allign="center">Temesgen Urgamo</td>
						    <td allign="center">M</td>
						    <td>temesgenurgamo@gmail.com </td>
							<td><marquee direction="down"><img src="../images/te.jpg" height="50" width="100%"></marquee></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2158/10</td>
							<td allign="center">Tarku Abota</td>
							<td allign="center">M</td>
							<td>Tareabota@gmail.com </td>
							<td><marquee direction="left"><img src="../images/n.jpg" height="50" width="100%"></marquee></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2144/10</td>
							<td allign="center">Nebiyu Dubale</td>
							<td allign="center">M</td>
							<td>nebiyudu2112@gmail.com</td>
							<td><marquee direction="down"><img src="../images/t.jpg" height="50" width="100%"></marquee></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2044/10</td>
							<td allign="center">Fasil Mamo</td>
							<td allign="center">M</td>
							<td>Fasilmamo.ethiopian@gmail.com </td>
							<td><marquee direction="up"><img src="../images/f.jpg" height="50" width="100%"></marquee></td>
							
						</tr>
						<tr>
							<td allign="center">EAMIT/2146/10</td>
							<td allign="center">Neway Dubale</td>
							<td allign="center">M</td>
							<td>newaytkd@gmail.com </td>
							<td><marquee><img src="../images/ne.jpg" height="50" width="100%"></marquee></td>
							
						</tr>
					</table>
			</section>
</div>					
				

	 </div></td>
	 
	 </tr>
	 <tr><td>
<?php
include("../footer.php");
?>
</td></tr>

</div>
</table>
</body>
</html>