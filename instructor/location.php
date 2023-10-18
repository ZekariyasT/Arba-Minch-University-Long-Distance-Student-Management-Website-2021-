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
    require("menuins.php");
?>
</td></tr>
<tr><td>

<?php
		include("sidemenuins.php");
	?>				
</td><td>
	<div id="contentindex500">


			<div class="portfolio-area" style=" width:820px;">	
				<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/?q=Arba Minch Arba Minch University &amp;z=14&amp;output=embed&amp;hl=en-GB&amp;t=h;output=embed"></iframe><br />
				<small><a href="http://maps.google.com/?q=Arba Minch University &amp;z=14&amp;hl=en-GB&amp;t=h" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				</div>
				
				
	
	 </div></td>
	 
	 </tr>
	 <tr><td >
<?php
include("../footer.php");
?>
</td></tr>

</div>
</table>
</body>
</html>