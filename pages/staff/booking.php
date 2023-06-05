<?php  
include('../connect.php');
include('staffhead.php');
session_start();

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
	$cbocid=$_POST['cbocid'];
	$txtcsid=$_POST['txtcsid'];
	$cbopid=$_POST['cbopid'];
	$txtbdate=$_POST['txtbdate'];
	
		$Insert="INSERT INTO `booking`
		(`date`, `cid`, `csid`, `pid`) 
		VALUES 
		('$txtbdate','$cbocid','$txtcsid','$cbopid')
		";
		$ret=mysqli_query($connection,$Insert);

		if($ret) 
		{	
			echo "<script>window.alert('SUCCESS : New Booking Added')</script>";
			echo "<script>window.location='btable.php'</script>";
		}
		else
		{
			echo "<p>Error : Something went wrong " . mysqli_error($connection) . "</p>";
		}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Booking</title>


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
        <form action="booking.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Booking Information</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
					<select name="cbocid" class="form-label">
					<!-- <label for="name">Choose Customer</label> -->
					
			<option class="form-label" required>Choose Customer</option>
			
			<?php  
			$d_query="SELECT * FROM customer where csid='$csid'";
			$d_ret=mysqli_query($connection,$d_query);
			$d_count=mysqli_num_rows($d_ret);

			for($i=0;$i<$d_count;$i++) 
			{ 
				$row=mysqli_fetch_array($d_ret);
				$cid=$row['cid'];
				$cname=$row['cName'];

				echo "<option value='$cid'>$cid - $cname</option>";
			}
			?>
			</select>
                        
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtmail"  value="<?php echo $pagename ?>" readonly placeholder="name@example.com">
                        <label for="text">Page</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <!-- <label for="phone">Procedure</label> -->
						<select name="cbopid" class="form-label">
			<option>Choose Procedure</option>
			<?php  
			$r_query="SELECT * FROM `procedure`";
			$r_ret=mysqli_query($connection,$r_query);
			$r_count=mysqli_num_rows($r_ret);

			for($i=0;$i<$r_count;$i++) 
			{ 
				$row=mysqli_fetch_array($r_ret);
				$pid=$row['pid'];
				$pname=$row['pName'];

				echo "<option value='$pid'>$pid - $pname</option>";
			}
			?>
			</select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control"  name="txtbdate" >
						<input type="hidden" name="txtcsid"  value="<?php echo $csid ?>" readonly>
                        <label for="date">Booking Date</label>
                    </div>
                </div>
            </div>
            
            <button class="u-btn-gold" name="btnadd">
                Booking
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