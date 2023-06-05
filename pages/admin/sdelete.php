<?php  
include('../connect.php');


$bid=$_GET['csid'];

$Delete="DELETE FROM customerservice WHERE csid='$csid' ";
$ret=mysqli_query($connection,$Delete);

if($ret) //True
{
	echo "<script>window.alert('SUCCESS : Page Information Deleted')</script>";
	echo "<script>window.location='cstable.php'</script>";
}
else
{
	echo "<p>Error : Something went wrong in Candidate Delete Process" . mysqli_error($connection) . "</p>";
}

?>