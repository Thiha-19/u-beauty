<?php  
session_start();
include('connect.php');

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

if(isset($_POST['btnadd'])) 
{
	$txtcname=$_POST['txtcname'];
	$txtmail=$_POST['txtmail'];
	$txtphone=$_POST['txtphone'];
	$txtdob=$_POST['txtdob'];
	$txtaddress=$_POST['txtaddress'];
	$txtage=$_POST['txtage'];
	$txtcsid=$_POST['txtcsid'];
	$Select="SELECT * FROM customer
            WHERE cname='$txtcname'";
    $retSelect=mysqli_query($connection,$Select);
    $Select_Count=mysqli_num_rows($retSelect);
        if ($Select_Count>0) 
        {
            echo "<script>window.alert('Error :Customer Already Registered')</script>";
            echo "<script>window.location='customerregister.php'</script>";
        }
        else 
        {
			$Insert="INSERT INTO `customer`
			(`cname`, `age`, `email`,`address`,`phone`,`dob`,`csid`) 
			VALUES 
			('$txtcname','$txtage','$txtmail','$txtaddress','$txtphone','$txtdob', '$txtcsid')
			";
			$ret=mysqli_query($connection,$Insert);

			if($ret) 
			{
				// $txt="Admin created new department ".$txtdname." at ". $txtdate;

				// $insert="INSERT INTO `log`
				// (`ltid`, `date`,`text`) 
				// VALUES ('1','$txtdate','$txt')
				// ";
				// $ret1=mysqli_query($connection,$insert);

				echo "<script>window.alert('SUCCESS : New Customer Registered')</script>";
				echo "<script>window.location='customertable.php'</script>";
			}
			else
			{
				echo "<p>Error : Something went wrong " . mysqli_error($connection) . "</p>";
			}
		}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Customer</title>


</head>
<body>


<form action="customerregister.php" method="post" enctype="multipart/form-data">

<fieldset class="text-center">
<legend>Enter New Customer :</legend>
<input type="hidden" name="txtdate" id="currentTime">
 
<script>
var today = new Date();
var time = today.getFullYear() + "-" + today.getMonth() + "-" + today.getDate();
  document.getElementById("currentTime").value = time;
</script>
<input type="hidden" name="txtcsid"  value="<?php echo $csid ?>" readonly/>
	<div class="form-group">
    	<label for="" class="form-label">Customer Name</label>
    	<input type="text" class="form-label" name="txtcname" unique placeholder="Eg.Mg Mg" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Email</label>
    	<input type="email" class="form-label" name="txtmail" placeholder="Eg.***@gmail.com" required/>
    </div>

    <div class="form-group">
    	<label for="" class="form-label">Phone</label>
    	<input type="text" class="form-label" name="txtphone" placeholder="Eg.09-000000" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">DOB</label>
    	<input type="date" class="form-label" name="txtdob"  required/>
    </div>

    <div class="form-group">
    	<label for="" class="form-label">Address</label>
    	<input type="text" class="form-label" name="txtaddress" placeholder="Eg.Yangon" required/>
    </div>

    <div class="form-group">
    	<label for="" class="form-label">Age</label>
    	<input type="text" class="form-label" name="txtage" placeholder="Eg.40" required/>
    </div>

	<input type="submit" name="btnadd" class="btn btn-secondary" value="Add"/>
	<input type="reset"  class="btn btn-danger" value="Clear"/>
</fieldset>



</form>
</body>
</html>