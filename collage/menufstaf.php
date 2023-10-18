<table>
<tr><td>
  <div id="menubar1">
  
  <ul>
 <li></li>  <li></li>
					<?php
						$id=$_SESSION['suid'];
$s=mysqli_query($conn,"select*from user where UID='$id'");
$rr=mysqli_fetch_array($s);
$cc=$rr['c_code'];

$query1 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='tutorial'and c_code='$cc'")
or die(mysqli_error());
$coun1 = mysqli_num_rows($query1);
$query2 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='mexamassign'and c_code='$cc'")
or die(mysqli_error());
$coun2 = mysqli_num_rows($query2);
$query3 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='iexam'and c_code='$cc'")
or die(mysqli_error());
$coun3 = mysqli_num_rows($query3);
$query4 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='massignment'and c_code='$cc'")
or die(mysqli_error());
$coun4 = mysqli_num_rows($query4);
$query5 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='mexam'and c_code='$cc'")
or die(mysqli_error());
$coun5 = mysqli_num_rows($query5);
$query6 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='pexam'and c_code='$cc'")
or die(mysqli_error());
$coun6 = mysqli_num_rows($query6);
$query7 = mysqli_query($conn,"select * from payment_table where status=' ' and unread='no'  and type='module'and c_code='$cc'")
or die(mysqli_error());
$coun7 = mysqli_num_rows($query7);

$total=$coun1+$coun2+$coun3+$coun4+$coun5+$coun6+$coun7;
if($total>='1')
{
?>									
<li><a href="allrequest.php"><font size="4px" color="#f0e459">New Request From Department[<?php echo $total?>]</font></a></li>
		<?php
		}
		else
		{
			?>
<li><a href="allrequest.php">Request For Employee worked Time</a></li>
			<?php
		}
		?>
		<li><a href="viewacadamicschedul.php">View Acadamic Schedule</a></li>
		
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
							
							<span style="color: #dbf428">Notification[<?php echo $count; ?>] </span>
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
 <a href="" style="margin-left:px;"> <?php
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
					
					
					<div class="clearfix"></div>
				</ul>             
	</div>					
</td></tr></table>