<?php  
include('connect.php');


$bid=$_GET['bid'];

$Delete="DELETE FROM booking WHERE bid='$bid' ";
$ret=mysqli_query($connection,$Delete);

if($ret) //True
{
	echo "<script>window.alert('SUCCESS : Booking Information Deleted')</script>";
	echo "<script>window.location='btable.php'</script>";
}
else
{
	echo "<p>Error : Something went wrong in Candidate Delete Process" . mysqli_error($connection) . "</p>";
}

?>