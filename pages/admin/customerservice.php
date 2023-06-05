<?php  
include('../connect.php');
include('adminhead.php');

if(isset($_POST['btnadd'])) 
{
	$txtpname=$_POST['txtpname'];
	$txtaname=$_POST['txtaname'];
	$txtphone=$_POST['txtphone'];
	$txtuname=$_POST['txtuname'];
	$txtpass=$_POST['txtpass'];
	$Select="SELECT * FROM customerservice
            WHERE pagename='$txtpname'";
    $retSelect=mysqli_query($connection,$Select);
    $Select_Count=mysqli_num_rows($retSelect);
        if ($Select_Count>0) 
        {
            echo "<script>window.alert('Error :Page Already Exists')</script>";
            echo "<script>window.location='cstable.php'</script>";
        }
        else 
        {
			$Insert="INSERT INTO `customerservice`
			(`pageName`, `adminName`, `phone`,`username`,`password`) 
			VALUES 
			('$txtpname','$txtaname','$txtphone','$txtuname','$txtpass')
			";
			$ret=mysqli_query($connection,$Insert);

			if($ret) 
			{
				// $txt="Admin added new Customer Service ".$txtpname." at ". $txtdate;

				// $insert="INSERT INTO `log`
				// (`ltid`, `date`,`text`) 
				// VALUES ('1','$txtdate','$txt')
				// ";
				// $ret1=mysqli_query($connection,$insert);

				echo "<script>window.alert('SUCCESS : New Page Added')</script>";
				echo "<script>window.location='cstable.php'</script>";
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
	<title>Add Customer Service</title>


</head>
<body>


<!-- <form action="customerservice.php" method="post" enctype="multipart/form-data">

<fieldset class="text-center">
<legend>Enter New Customer Service Information:</legend>
<input type="hidden" name="txtdate" id="currentTime">
 
<script>
var today = new Date();
var time = today.getFullYear() + "-" + today.getMonth() + "-" + today.getDate();
  document.getElementById("currentTime").value = time;
</script>
	<div class="form-group">
    	<label for="" class="form-label">Page Name</label>
    	<input type="text" class="form-label" name="txtpname" unique placeholder="Eg.U BEA CLINIC 1" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Admin Name</label>
    	<input type="text" class="form-label" name="txtaname" placeholder="Eg.Mg Mg" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Phone</label>
    	<input type="text" class="form-label" name="txtphone" placeholder="Eg.09-0000000" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Username</label>
    	<input type="text" class="form-label" name="txtuname" placeholder="Eg.ko pr ko pay" required/>
    </div>

	<div class="form-group">
    	<label for="" class="form-label">Password</label>
    	<input type="password" class="form-label" name="txtpass" placeholder="Eg.********" required/>
    </div>

	<input type="submit" name="btnadd" class="btn btn-secondary" value="Add"/>
	<input type="reset"  class="btn btn-danger" value="Clear"/>
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
        <form action="customerservice.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Customer Service Registersation</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtpname" placeholder="name@example.com" required>
                        <label for="name"> Page Name</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtaname" placeholder="name@example.com" required>
                        <label for="text">Admin Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtphone" placeholder="phone@example.com" required>
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  name="txtuname" placeholder="phone@example.com" required>
                        <label for="text">Username</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="txtpass" placeholder="phone@example.com" required>
                        <label for="password">Password</label>
                    </div>
                </div>
                
            </div>
            <button class="u-btn-gold" name="btnadd">
                Register
            </button>

        </form>
            </div>
        </div>

        </div>
      <footer>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>