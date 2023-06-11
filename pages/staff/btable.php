<?php
	session_start();
	include('../connect.php');
	include('staffhead.php');

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
	
}
else
{
	
}

	if(isset($_POST['btnadd'])) 
	{
		echo "<script>window.location='booking.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body >

<?php  
$re_List="SELECT b.*, c.*, cs.*, p.*
            FROM booking b, customer c, customerservice cs, `procedure` p
            where b.cid = c.cid AND b.csid =cs.csid AND p.pid = b.pid and b.csid = '$csid'
			 ";
$re_ret=mysqli_query($connection,$re_List);
$re_count=mysqli_num_rows($re_ret);

if ($re_count < 1) 
{
	echo "<p>No Booking Records Found.</p>";
	echo "<script>window.location='booking.php'</script>";
}
else
{
?>
<div id="body-section">
    <h1 class="form-title mt-5">Booking List</h1>
    <div class="table-container mb-5">
        <table id="tableid" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Booking ID</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Page</th>
                <th>Procedure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
	for($i=0;$i<$re_count;$i++) 
	{ 
		$rows=mysqli_fetch_array($re_ret);
		//print_r($rows);

		$bid=$rows['bid'];
        $date=$rows['date'];
        $cid=$rows['cName'];
        $csid = $rows['pageName'];
        $procedure = $rows['pName'];

        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";
        echo "<td>$bid</td>";
        echo "<td>$date</td>";
        echo "<td>$cid</td>";
        echo "<td>$csid</td>";
        echo "<td>$procedure</td>";
        echo "<td class='d-flex'>
			  <a href='bupdate.php?bid=$bid'  class='u-btn-gold table-btn table-btn-blue'>Update</a>
			  <a href='bdelete.php?bid=$bid'  class='u-btn-gold table-btn table-btn-red'>Delete</a>
			  </td>";
        echo "</tr>";
    }
        ?>
        </tbody>
        </table>
    </div>
    <a href="booking.php" class="btn u-btn-gold table-outer-btn"> Add Booking </a>
    <?php
    }
    ?>
</div>
<?php
include('../footer.php'); ?>

<script>
    $(document).ready(function () {
        $('#tableid').DataTable({
            "columnDefs": [
                {"width": "25%", "targets": -1}
            ]
        });
    });
</script>
<!--<footer></footer>-->
</body>
</html>