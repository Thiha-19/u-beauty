<?php  
include('connect.php');


$cid=$_GET['cid'];

$Delete=" DELETE FROM customer c , booking b where b.cid = c.cid AND c.cid = '$cid'  ";
$ret=mysqli_query($connection,$Delete);

if($ret) //True
{
	echo "<script>window.alert('SUCCESS : Customer Information Deleted')</script>";
	echo "<script>window.location='customertable.php'</script>";
}
else
{
	echo "<p>Error : Something went wrong in Candidate Delete Process" . mysqli_error($connection) . "</p>";
}

?>