
<?php
	include('../connection.php');

$query1=mysqli_query($conn,"UPDATE payment_table SET unread='yes',status='no' where status=' ' and unread='no' and type='mexam'");
if($query1)
{
$x='<script type="text/javascript">alert("Succssfully Send !!!");
window.location=\'unreaddmexam.php\';</script>';
echo $x;	
}
else
{
$x='<script type="text/javascript">alert("not Send");
window.location=\'unreaddmexam.php\';</script>';
echo $x;	

}

?>