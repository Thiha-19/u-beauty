<?php  
session_start();
include('../connect.php');
include('staffhead.php');


if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];

	$select="select * from customer
			 where cid='$cid'";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	$cid=$data['cid'];
	$cname=$data['cName'];
	$email=$data['email'];
	$address=$data['address'];
	$job=$data['job'];
	$phone=$data['phone'];
	$dob=$data['dob'];
	function countdays($date)   
	{
		 global $return;
		 $olddate =  substr($date, 4); 
		 $newdate = date("Y") ."".$olddate; 
		 $nextyear = date("Y")+1 ."".$olddate; 
		 
		 
			if(strtotime($newdate) > strtotime(date("Y-m-d"))) 
			{
			$start_ts = strtotime($newdate); 
			$end_ts = strtotime(date("Y-m-d"));
			$diff = $end_ts - $start_ts; 
			$n = round($diff / (60*60*24));
			$return = substr($n, 1); 
			return $return; 
			}
			else
			{
			$start_ts = strtotime(date("Y-m-d")); 
			$end_ts = strtotime($nextyear); 
			$diff = $end_ts - $start_ts; 
			$n = round($diff / (60*60*24)); 
			$return = $n; 
			return $return; 
			}
		
		}
}
else
{
	
}

if(isset($_POST['btnup'])) 
{	
	$txtcid=$_POST['txtcid'];
	$txtcname=$_POST['txtcname'];
	$txtmail=$_POST['txtmail'];
	$txtaddress=$_POST['txtaddress'];
	$txtphone=$_POST['txtphone'];
	$txtdob=$_POST['txtdob'];
	$txtjob=$_POST['txtjob'];


	$Update="UPDATE customer
			 SET
			 cname='$txtcname',
			 email='$txtmail',
             address='$txtaddress',
             job='$txtjob',
             phone='$txtphone',
             dob='$txtdob'
			 WHERE
			 cid='$txtcid'
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

		echo "<script>window.alert('SUCCESS : Customer Info Updated')</script>";
		echo "<script>window.location='customertable.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in Update" . mysqli_error($connection) . "</p>";
	}
}


if (isset($_GET['cid'])) 
{
	$cid=$_GET['cid'];

	$c_List="SELECT * 
				 FROM customer
				 ";
	$c_ret=mysqli_query($connection,$c_List);
	$c_count=mysqli_num_rows($c_ret);
	$rows=mysqli_fetch_array($c_ret);

	if($c_count < 1) 
	{
		echo "<script>window.alert('ERROR : Customer Info Not Found')</script>";
		echo "<script>window.location='main.php'</script>";
	}
}
else
{
	$cid="";
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Update</title>


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
        <form action="customerupdate.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Customer Update</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="txtcname" value="<?php echo $cname ?>" required>
						<input type="hidden" name="txtcid"  value="<?php echo $cid ?>" readonly>
                        <label for="name"> Customer Name</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="txtmail" value="<?php echo $email ?>" required>
                        <label for="email">Email</label>
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
                        <input type="date" class="form-control"  name="txtdob" value="<?php echo $dob ?>" required>
                        <label for="dob">Date of Birth</label>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control"  name="txtjob" value="<?php echo $job ?>" required>
                        <label for="text">Occupation</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea name="txtaddress"  class="form-control" cols="30" rows="5" style="height:1%"><?php echo $address ?></textarea>
                <label for="address">Address</label>
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
</html>