<?php
session_start();
include('connect.php');
include('staffhead.php');


if(isset($_SESSION['csid']))
{   
	$csid=$_SESSION['csid'];
    
    $select="SELECT `csid`, `pagename`, `adminname`
    FROM `customerservice` 
    WHERE csid = '$csid'
    ";
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$csid=$_SESSION['csid'];
	$pagename=$data['pagename'];
	$adminname=$data['adminname'];
}
else
{
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <fieldset>
    <form action="main.php">
        <legend>Kyite tr choose mite tr choose</legend>
        
<input type="text" name="txtcsid"  value="<?php echo $csid ?>" readonly/>
<input type="text" name="txtpagename"  value="<?php echo $pagename ?>" readonly/>
<input type="text" name="txtadminname"  value="<?php echo $adminname ?>" readonly/><br>
        <a href="procedure.php">Procedure add m lr</a><br>
        <a href="staffcustomer.php">Customer add m lr</a><br>
        <a href="customerservice.php">Page add m lr</a><br>
        <a href="booking.php">Booking add m lr</a><br>
        </form>
    </fieldset>
</body>
</html>