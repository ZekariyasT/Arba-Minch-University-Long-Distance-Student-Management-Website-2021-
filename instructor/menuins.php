<!-- CuFon ends -->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script> 

<table>
<tr><td>
  <div id="menubar1">
  
  <ul>
					<li>
						<a  href="uploadmoduleto.php">
							
							<span>Upload Prepared Module</span>
						</a>
					</li>
					<li>
						<a href="assignmentdownload.php">
							
							<span >Download submited asignment</span>
						</a>
					
</li>	
<li>
					<?php
					
					$user_id=$_SESSION['suid'];
	$sql="SELECT * FROM message WHERE M_reciever='$user_id' and status='no' ORDER BY date_sended DESC";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	if($count>='1')
	{
					?>
						<a href="usernotification.php">
							
							<span style="color: yellow">Notification[<?php echo $count; ?>] </span>
						</a>
						<?php
						}
						else
						{
						?>
						<a href="usernotification.php">
							
							<span >Notification[<?php echo $count; ?>] </span>
						</a>
						<?php
						}
						?>
</li>
							<div id="ab">
   <li>
 <a href=""> <?php
echo "<b><img class=ppq src='".$_SESSION['sphoto']."'width=180px height=160px border=15px >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size = '4px'color=#fff>".$_SESSION['sfn'].""; 
?></a>
            <ul>
            			<li>
<a href="userprofile.php"><span>User profile</span></a>
			</li>
			<li>
<a href="changepass.php"><span>change password</span></a>
			</li>
             <li>
<a href="updateprofilephoto.php"><span>update profile</span></a>
			</li>
             <li>
 <a href="../logout.php">Logout</a>
             </li>
        </ul>
      </li>
		</div>	
					
					
					<div class="clearfix"></div>
				</ul>             
	</div>					
</td></tr></table>
<style type="text/css">
	#ab li ul
{
    display: none;
}

#ab ul li a 
{
    display: block;
    text-decoration: none;
    color: #ffffff;
    border-top: 1px solid #ffffff;
    padding: 5px 10px 5px 10px;
    background: #133877;
    margin-left: -100px;
    white-space: nowrap;
}

#ab ul li a:hover 
{
    background: #133877;
    
}
#ab li:hover ul 
{
	margin-left: 120px;
    display: block;
    position: absolute;
}

#ab li:hover li
{
    float: none;
    font-size: 11px;
}

#ab li:hover a 
{
    background:#133877;
}

#ab li:hover li a:hover 
{
    background: #133877;
}
.ppq{
	position: absolute;
	width: 40px;
	height: 30px;
	border: 2px;
	border-radius: 50%;
	overflow: hidden;
	outline: none;
	cursor: pointer;
}
</style>