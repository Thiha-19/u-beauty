<?php  
session_start();
include('header.php');
include('connect.php');

if(isset($_GET['csid']))
{
	$csid=$_GET['csid'];

	$select="select * from customerservice
			 where csid='$csid'";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$csid=$data['csid'];
	$pagename=$data['pageName'];
    $adminname=$data['adminName'];
	$phone=$data['phone'];
	$username=$data['username'];
	$password=$data['password'];
}
else
{
	
}

if(isset($_POST['btnup'])) 
{	
	$txtcsid=$_POST['txtcsid'];
	$txtpagename=$_POST['txtpagename'];
	$txtadminname=$_POST['txtadminname'];
	$txtphone=$_POST['txtphone'];
	$txtusername=$_POST['txtusername'];
	$txtpassword=$_POST['txtpassword'];


	$Update="UPDATE customerservice
			 SET
			 pageName='$txtpagename',
			 adminName='$txtadminname',
			 phone='$txtphone',
             userName='$txtusername',
             password='$txtpassword'
			 WHERE
			 csid='$txtcsid'
			 ";
	$ret=mysqli_query($connection,$Update);

	if($ret) //True
	{	
		//$txt="Admin updated department ".$txtdname." at ". $txtdate;

			//$insert="INSERT INTO `log`
			//( `ltid`, `date`,`text`) 
			//VALUES ('2','$txtdate','$txt')
			//";
			//$ret1=mysqli_query($connection,$insert);

		echo "<script>window.alert('SUCCESS : Customer Service Info Updated')</script>";
		echo "<script>window.location='cstable.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Update" . mysqli_error($connection) . "</p>";
	}
}


if (isset($_GET['csid'])) 
{
	$csid=$_GET['csid'];

	$c_List="SELECT * 
				 FROM customerservice
				 ";
	$c_ret=mysqli_query($connection,$c_List);
	$c_count=mysqli_num_rows($c_ret);
	$rows=mysqli_fetch_array($c_ret);

	if($c_count < 1) 
	{
		echo "<script>window.alert('ERROR : Customer Service Info Not Found')</script>";
		echo "<script>window.location='cstable.php'</script>";
	}
}
else
{
	$csid="";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Service Update</title>


</head>
<body>


<!-- <form action="staffupdate.php" method="post" >

<fieldset class="text-center">
<legend>Enter Updated Customer Service Information :</legend>
<input type="hidden" name="txtdate" id="currentTime">
 
<script>
var today = new Date();
var time = today.getFullYear() + "-" + today.getMonth() + "-" + today.getDate();
  document.getElementById("currentTime").value = time;
</script>
    <div class="form-group">        
    	<label for="">Staff ID</label>
    	<input type="text" name="txtcsid"  value="<?php echo $csid ?>" readonly>
    </div>

    <div class="form-group">
    	<label for="">Page</label>
    	<input type="text" name="txtpagename"  value="<?php echo $pagename ?>" required/>
    </div>

	<div class="form-group">
    	<label for="">Admin</label>
    	<input type="text" name="txtadminname" value="<?php echo $adminname ?>" required/>
    </div>

    <div class="form-group">
    	<label for="">Phone</label>
    	<input type="mail" name="txtphone" value="<?php echo $phone ?>" required/>
    </div>

	<div class="form-group">
    	<label for="">Username</label>
    	<input type="text" name="txtusername" value="<?php echo $username ?>" required/>
    </div>
    
	<div class="form-group">
    	<label for="">Password</label>
    	<input type="text" name="txtpassword" value="<?php echo $password ?>" required/>
    </div>

	<input type="submit" name="btnup" class="btn btn-secondary" value="Update">
</fieldset>



</form> -->
<div id="body-section">
            <div class="gold-line-container">
                <div class="left-gold-line"></div>
                <div class="left-gold-line"></div>
            </div>
        <div class="gold-line-container">
            <div class="left-gold-line"></div>
            <div class="left-gold-line"></div>
        </div>
        <div class="form-container">

            <div class="form-outer-border">
        <form action="staffupdate.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Customer Update</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtpagename" value="<?php echo $pagename ?>" required>
						<input type="hidden" name="txtcsid"  value="<?php echo $csid ?>" readonly>
                        <label for="name"> Page Name</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtadminname" value="<?php echo $adminname ?>" required>
                        <label for="text">Admin Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtphone" value="<?php echo $phone ?>" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  name="txtusername" value="<?php echo $username ?>" required>
                        <label for="text">Username</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="txtpassword" value="<?php echo $password ?>" required>
                        <label for="password">Password</label>
                    </div>
                </div>
            </div>
            <button class="u-btn-gold" name="btnup">
                Update
            </button>

        </form>
            </div>
        </div>

        </div>
</body>
</html>