<?php  
session_start();
include('connect.php');
include('staffhead.php');

if(isset($_GET['bid']))
{
	$bid=$_GET['bid'];

	$select="SELECT b.*, c.*, cs.*, p.*
    FROM booking b, customer c, customerservice cs, `procedure` p
    where b.cid = c.cid AND b.csid =cs.csid AND p.pid = b.pid AND b.bid = $bid;";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$bid=$data['bid'];
	$date=$data['date'];
	$cid=$data['cName'];
    $csid=$data['pageName'];
    $csname=$data['adminName'];
    $procedure=$data['pName'];
}
else
{
	
}

if(isset($_POST['btnup'])) 
{	
    $txtbid=$_POST['txtbid'];
	$txtdate=$_POST['txtdate'];
	$txtcname=$_POST['txtcname'];
	$txtcsname=$_POST['txtcsname'];
	$txtpname=$_POST['txtpname'];


	$Update="UPDATE booking
			 SET
			 date='$txtdate'
			 WHERE
			 bid='$txtbid'
			 ";
	$ret=mysqli_query($connection,$Update);

	if($ret) //True
	{	
		// $txt="Admin updated recruitment ".$txtreid." at ". $txtdate;

		// 	$insert="INSERT INTO `log`
		// 	(`ltid`, `date`,`text`) 
		// 	VALUES ('1','$txtdate','$txt')
		// 	";
		// 	$ret1=mysqli_query($connection,$insert);

		echo "<script>window.alert('SUCCESS : Booking Info Updated')</script>";
		echo "<script>window.location='btable.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Update" . mysqli_error($connection) . "</p>";
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Info Update</title>


</head>
<body>


<form action="bupdate.php" method="post" >

<fieldset class="text-center">
<legend>Booking Update Information :</legend>
<input type="hidden" name="txtdate" id="currentTime">
 
<script>
var today = new Date();
var time = today.getFullYear() + "-" + today.getMonth() + "-" + today.getDate();
  document.getElementById("currentTime").value = time;
</script>


    <div class="form-group">      
		<label for="" class="form-label">Booking ID</label>  
    	<input type="text" name="txtbid" id=""  value="<?php echo $bid ?>" readonly>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Booking Date</label>
		<input type="date" class="form-label" name="txtdate" id=""  value="<?php echo $date ?>" >
		
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Customer Name</label>
    	<input type="text" name="txtcname" id=""  value="<?php echo $cid ?>" readonly>
    </div>

    <div class="form-group">
    	<label for="" class="form-label">Page Name</label>
    	<input type="text" name="txtcsname" id=""  value="<?php echo $csid ?>" readonly>
    </div>

    <div class="form-group">
    	<label for="" class="form-label">Procedure Name</label>
    	<input type="text" name="txtpname" id=""  value="<?php echo $procedure ?>" readonly>
    </div>



	<input type="submit" name="btnup" class="btn btn-secondary" value="Update">
	<input type="reset" class="btn btn-danger" value="Clear">
</fieldset>



</form>
</body>
</html>