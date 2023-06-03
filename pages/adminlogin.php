<?php  
session_start();
include('connect.php');
include('adminloginhead.php');



if(isset($_POST['btnlogin'])) 
{
	$txtuname=$_POST['txtuname'];
	$txtpassword=$_POST['txtpassword'];

	if($txtuname == 'admin' && $txtpassword == 'admin123') 
	{   
			echo "<script>window.alert('Success : Admin Login Success')</script>";
			echo "<script>window.location='adminmain.php'</script>";       
	}
	else
	{
		
		echo "<script>window.alert('Error : Login Failed | Check Email or Password')</script>";
		echo "<script>window.location='adminlogin.php'</script>";
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
        <form action="adminlogin.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Admin Log In</h1>
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
<?php 
include('footer.php'); 
?>
</body>
</html>