<?php  
session_start();
include('connect.php');
include('loginheader.php');



if(isset($_POST['btnlogin'])) 
{
	$txtuname=$_POST['txtuname'];
	$txtpassword=$_POST['txtpassword'];

	$Check="SELECT `username`, `password`, `csid` 
    FROM `customerservice` 
    WHERE username = '$txtuname' and password = '$txtpassword'
	";

	$ret=mysqli_query($connection,$Check);
	$count=mysqli_num_rows($ret);
	$rows=mysqli_fetch_array($ret);
	

	if($count < 1) 
	{
		echo "<script>window.alert('Error : Login Failed | Check Username or Password')</script>";
		echo "<script>window.location='index.php'</script>";
	}
	else
	{
		$_SESSION['csid']=$rows['csid'];
		
        echo "<script>window.alert('Success : Page Login Success)</script>";
	 	echo "<script>window.location='main.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page Login</title>
</head>
<body>

<!-- <form action="index.php" method="post" style = "">


<legend>Enter Page Login Information :</legend>

<div class="form-label">
    	<label for="" class="form-label">Username</label>
    	<input type="text" name="txtuname" placeholder="username ko yay" required/>
</div>

<div class="form-label">
    	<label for="" class="form-label">Password</label>
    	<input type="password" name="txtpassword" placeholder="*********" required/>
</div>

		<input type="submit" class="btn btn-secondary" name="btnlogin" value="Login" />
		<input type="reset" class="btn btn-danger" name="btnClear" value="Clear" />
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
        <form action="index.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Log In Information</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtuname" placeholder="name@example.com" required>
                        <label for="name"> Username</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="txtpassword" placeholder="name@example.com" required>
                        <label for="password">Password</label>
                    </div>
                </div>
            </div>
            <button class="u-btn-gold" name="btnlogin">
                Log In
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