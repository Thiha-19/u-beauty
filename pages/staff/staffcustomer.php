<?php  
session_start();
include('../connect.php');
include('staffhead.php');

if(isset($_SESSION['csid']))
{   
	$csid=$_SESSION['csid'];
    
    $select="SELECT `csid`, `pageName`, `adminName`
    FROM `customerservice` 
    WHERE csid = '$csid'
    ";
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$csid=$_SESSION['csid'];
	$pagename=$data['pageName'];
	$adminname=$data['adminName'];
}
else
{
	
}

if(isset($_POST['btnadd'])) 
{
	$txtcsid=$_POST['txtcsid'];
	$txtcname=$_POST['txtcname'];
	$txtmail=$_POST['txtmail'];
	$txtphone=$_POST['txtphone'];
	$txtdob=$_POST['txtdob'];
	$txtjob=$_POST['txtjob'];
	$txtaddress=$_POST['txtaddress'];
	$txtcsid=$_POST['txtcsid'];
	$Select="SELECT * FROM customer
            WHERE cName='$txtcname'";
    $retSelect=mysqli_query($connection,$Select);
    $Select_Count=mysqli_num_rows($retSelect);
        
    if ($Select_Count>0) 
        {
            echo "<script>window.alert('Error :Customer Already Registered')</script>";
            echo "<script>window.location='customertable.php'</script>";
        }
        else 
        {
			$Insert="INSERT INTO `customer`
            (`cName`,  `email`,`address`,`phone`,`job`,`dob`,`csid`) 
			VALUES 
            ('$txtcname','$txtmail','$txtaddress','$txtphone','$txtjob','$txtdob', '$txtcsid')
			";
			$ret=mysqli_query($connection,$Insert);

			if($ret) 
			{
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="index.css">
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
        <form action="staffcustomer.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Customer Registration</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" name="txtcsid" value="<?php echo $csid ?>">
                        <input type="text" class="form-control" name="txtcname" placeholder="name@example.com">
                        <label for="name"> Customer Name</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="txtmail" placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtphone" placeholder="phone@example.com">
                        <label for="phone">Phone</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control"  name="txtdob" placeholder="phone@example.com">
                        <label for="dob">Date of Birth</label>
                    </div>
                </div>
            </div><div class="row">
                <div class="col-sm-12 ">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtjob" placeholder="phone@example.com">
                        <label for="text">Occupation</label>
                    </div>
                </div>
                
            </div>
            <div class="form-floating mb-3">
                <textarea name="txtaddress" class="form-control" cols="30" rows="5" style="height:1%" placeholder="hi"></textarea>
                <label for="address">Address</label>
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