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
	$currentdate = date('Y-m-d');

		$Insert="INSERT INTO `booking`
		(`date`, `status`, `cid`, `csid`, `pid`, `assignedDate`) 
		VALUES 
		('$txtbdate','Pending','$cbocid','$txtcsid','$cbopid','$currentdate')
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
    <?php
    $c_List = "SELECT * 
			 FROM customer
			 where csid='$csid'
			 ";
    $c_ret = mysqli_query($connection, $c_List);
    $c_count = mysqli_num_rows($c_ret);

    if ($c_count < 1) {
        echo '<h1 class="form-title mt-5" style="color:var(--theme-red);">No Customer Records Found</h1>';
        echo "<script>window.location='staffcustomer.php'</script>";
    } else {
        ?>
        <h1 class="form-title" style="padding-top: 5%;">Customer List</h1>
        <div class="table-container ">
            <table id="tableid" class="table table-hover">
                <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Occupation</th>
                    <th>Addresss</th>
                    <th>phone</th>
                    <th>Dob</th>

                </tr>
                </thead>
                <tbody>
                <?php
                for ($i = 0; $i < $c_count; $i++) {
                    $rows = mysqli_fetch_array($c_ret);
                    //print_r($rows);

                    $cid = $rows['cid'];
                    $cname = $rows['cName'];
                    $email = $rows['email'];
                    $job = $rows['job'];
                    $address = $rows['address'];
                    $phone = $rows['phone'];
                    $dob = $rows['dob'];

                    echo "<tr>";
                    echo "<td>$cid</td>";
                    echo "<td>$cname</td>";
                    echo "<td>$email</td>";
                    echo "<td>$job</td>";
                    echo "<td>$address</td>";
                    echo "<td>$phone</td>";
                    echo "<td>$dob</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    }
    ?>
    <div class="form-container" style="padding-top:5%">

        <div class="form-outer-border">
            <form action="booking.php" method="post" enctype="multipart/form-data">
                <h1 class="form-title">Booking Information</h1>
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="hidden" id="customer-id" name="cbocid">
                        </div>
                    </div>
                    <div class=" col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="txtmail" value="<?php echo $pagename ?>"
                                   readonly placeholder="name@example.com">
                            <label for="text">Page</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <!-- <label for="phone">Procedure</label> -->
                            <select name="cbopid" class="form-control">
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
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="txtbdate">
                            <input type="hidden" name="txtcsid" value="<?php echo $csid ?>" readonly>
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

<?php
include('../footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(() => {
        let dataTable = $('#tableid').DataTable({
            select: true,
            info: false,
            stateSave: true,
            rowId: 'id',
        });
        dataTable.on('select', function (e, dt, type, indexes) {
            let data = dt.row({selected: true}).data()
            console.log(data); // data[0] = first column data for example customer id

            $("#customer-id").val(data[0]);// to set the hidden input value

        })
    });
</script>
</body>
</html>