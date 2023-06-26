<?php  
session_start();
include('../connect.php');
include('adminhead.php');

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
    $page=$data['pageName'];
    $csname=$data['adminName'];
    $procedure=$data['pName'];
    $status=$data['status'];
    $remark=$data['remark'];
}
else
{
	
}

if(isset($_POST['btnup'])) 
{	
    $txtbid=$_POST['txtbid'];
	$txtremark=$_POST['txtremark'];


	$Update="UPDATE booking
			 SET
			 remark='$txtremark'
			 WHERE
			 bid='$txtbid'
			 ";
	$ret=mysqli_query($connection,$Update);

	if($ret) //True
	{	
		

		echo "<script>window.alert('SUCCESS : Remark Info Updated')</script>";
		echo "<script>window.location='adminbtable.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Update" . mysqli_error($connection) . "</p>";
	}
}
if (isset($_GET['bid'])) 
{
	$csid=$_GET['bid'];

	$c_List="SELECT * 
				 FROM booking
				 ";
	$c_ret=mysqli_query($connection,$c_List);
	$c_count=mysqli_num_rows($c_ret);
	$rows=mysqli_fetch_array($c_ret);

	if($c_count < 1) 
	{
		echo "<script>window.alert('ERROR : Booking Info Not Found')</script>";
		echo "<script>window.location='adminbtable.php'</script>";
	}
}
else
{
	$bid="";
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Info Update</title>


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
        <form action="bookingdetail.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Booking Info Update</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtcid" value="<?php echo $cid ?>" readonly>
                        <label for="text">Customer Name</label>
                    </div>
					<input type="hidden" class="form-control" name="txtbid" value="<?php echo $bid ?>" readonly>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="txtdate" value="<?php echo $date ?>" readonly>
                        <label for="date">Booking Date</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtpassword" value="<?php echo $procedure ?>" readonly>
                        <label for="password">Procedure</label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  name="txtcsname" value="<?php echo $page ?>" readonly>
                        <label for="text">PageName</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <div class="form-floating mb-3">
                <input type="text" class="form-control"  name="txtcsname" value="<?php echo $status ?>" readonly>
                <label for="text">Status</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <textarea name="txtremark" class="form-control" cols="30" rows="5" style="height:1%" placeholder="hi"><?php echo $remark ?></textarea>
                <label for="remark">Remark</label>
            </div>
            <button class="u-btn-gold" name="btnup">
                Update
            </button>

        </form>
            </div>
        </div>

        </div>
        <footer>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>s