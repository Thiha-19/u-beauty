<?php  
include('../connect.php');


$pid=$_GET['pid'];

$Delete="DELETE FROM `procedure` WHERE pid='$pid' ";
$ret=mysqli_query($connection,$Delete);

if($ret) //True
{
	echo "<script>window.alert('SUCCESS : Procedure Information Deleted')</script>";
	echo "<script>window.location='adminproceduretable.php'</script>";
}
else
{
	echo "<p>Error : Something went wrong in Candidate Delete Process" . mysqli_error($connection) . "</p>";
}

?>