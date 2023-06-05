<?php  
include('../connect.php');
include('adminhead.php');

if(isset($_POST['btnadd'])) 
{
	$txtproname=$_POST['txtproname'];
	$Select="SELECT * FROM `procedure`
            WHERE pname='$txtproname'";
    $retSelect=mysqli_query($connection,$Select);
    $Select_Count=mysqli_num_rows($retSelect);
        if ($Select_Count>0) 
        {
            echo "<script>window.alert('Error :Procedure Already Exists')</script>";
            echo "<script>window.location='procedure.php'</script>";
        }
        else 
        {
			$Insert="INSERT INTO `procedure`
			(`pname`) 
			VALUES 
			('$txtproname')
			";
			$ret=mysqli_query($connection,$Insert);

			if($ret) 
			{

				echo "<script>window.alert('SUCCESS : New Procedure Added')</script>";
				echo "<script>window.location='adminproceduretable.php'</script>";
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
	<title>Add New Procedure</title>


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
        <form action="procedure.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Procedure Information</h1>
            <div class="row">
                <div class=" col-sm-12 ">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtproname" placeholder="name@example.com" required>
                        <label for="name"> Procedure Name</label>
                    </div>
                </div>
            
            </div>
            <button class="u-btn-gold" name="btnadd">
                Add
            </button>

        </form>
            </div>
        </div>

        </div>
<?php
include('../footer.php');
?>
</body>
</html>