<?php  
session_start();
include('../connect.php');
include('adminhead.php');

if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];

	$select="select * from `procedure`
			 where pid='$pid'";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$pid=$data['pid'];
	$pname=$data['pName'];
}
else
{
	
}

if(isset($_POST['btnupdate'])) 
{	
	$txtpid=$_POST['txtpid'];
	$txtpname=$_POST['txtpname'];


	$Update="UPDATE `procedure`
			 SET
			 pName='$txtpname'
			 WHERE
			 pid='$txtpid'
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

		echo "<script>window.alert('SUCCESS : Procedure Info Updated')</script>";
		echo "<script>window.location='adminproceduretable.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Update" . mysqli_error($connection) . "</p>";
	}
}


if (isset($_GET['pid'])) 
{
	$pid=$_GET['pid'];

	$c_List="SELECT * 
				 FROM `procedure`
				 ";
	$c_ret=mysqli_query($connection,$c_List);
	$c_count=mysqli_num_rows($c_ret);
	$rows=mysqli_fetch_array($c_ret);

	if($c_count < 1) 
	{
		echo "<script>window.alert('ERROR : Procedure Info Not Found')</script>";
		echo "<script>window.location='adminproceduretable.php'</script>";
	}
}
else
{
	$pid="";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Procedure Update</title>


</head>
<body>


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
        <form action="pupdate.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Procedure Update Information</h1>
            <div class="row">
                <div class=" col-sm-12s">
                    <div class="form-floating mb-3">
					<input type="hidden" name="txtpid"  value="<?php echo $pid ?>" readonly>
                        <input type="text" class="form-control" name="txtpname" value="<?php echo $pname ?>" required>
                        <label for="name"> Procedures Name</label>
                    </div>
                </div>
            </div>
            <button class="u-btn-gold" name="btnupdate">
                Update
            </button>

        </form>
            </div>
        </div>

        </div>
<?php
include('../footer.php');
?>



</form>
</body>
</html>