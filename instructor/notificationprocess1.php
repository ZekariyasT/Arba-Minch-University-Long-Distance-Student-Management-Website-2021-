<?php
include("../connection.php");
	 $ud_id=$_POST['ud_id'];
    $M_sender=$_POST['M_sender'];
    $M_Reciever=$_POST['M_Reciever'];
	$message=$_POST['message'];
	$date_sended=$_POST['date_sended'];
	mysqli_query($conn,"UPDATE message SET M_sender='replay',status='yes' WHERE M_ID='$ud_id'");
	mysqli_query($conn,"INSERT INTO message(M_sender ,M_Reciever,message,date_sended,status)VALUES('$M_sender','$M_Reciever','$message',NOW(),'no')");
	
	header("location: usernotification.php");
?>