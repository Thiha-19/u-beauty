<?php
	session_start();
	include('../connect.php');
	include('adminhead.php');

	
    $select="SELECT `csid`, `pagename`, `adminname`
    FROM `customerservice`
    ";
	$query=mysqli_query($connection,$select);
	$data=mysqli_fetch_array($query);
	


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
$tomorrow=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+1, date("Y")));
$re_List = "SELECT b.*, c.*, cs.*, p.*
            FROM booking b, customer c, customerservice cs, `procedure` p
            where b.cid = c.cid AND p.pid = b.pid AND b.csid = cs.csid AND b.date = $tomorrow
			 ";
$re_ret=mysqli_query($connection,$re_List);
$re_count=mysqli_num_rows($re_ret);

if ($re_count < 1) 
{
	echo '<h1 class="form-title mt-5" style="color:var(--theme-red);">No Booking Records for Tomorrow.</h1>';
}
else
{
?>
<div id="body-section">
    <h1 class="form-title mt-5">Tomorrow Booking List</h1>
    <div class="table-container mb-5">
        <table id="tableid" class="table">
            <thead>
            <tr>
                <th>No</th>
                <th>Booking ID</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Page</th>
                <th>Procedure</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < $re_count; $i++) {
                $rows = mysqli_fetch_array($re_ret);
                //print_r($rows);

		$bid=$rows['bid'];
        $date=$rows['date'];
        $cid=$rows['cName'];
        $csid=$rows['pageName'];
        $procedure=$rows['pName'];
        $status=$rows['status'];

                echo "<tr>";
                echo "<td>" . ($i + 1) . "</td>";
                echo "<td>$bid</td>";
                echo "<td>$date</td>";
                echo "<td>$cid</td>";
                echo "<td>$csid</td>";
                echo "<td>$procedure</td>";
                echo "<td>$status</td>";
                echo "<td class='d-flex '>
			  <a href='adminbupdate.php?bid=$bid' class='u-btn-gold table-btn table-btn-blue'>Update</a>
			  <a href='bdelete.php?bid=$bid' class='u-btn-gold table-btn table-btn-red'>Delete</a>
			  </td>";
            }
            ?>
            </tbody>
        </table>
    </div>
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
                {"width": "16%", "targets": -1}
            ]
        });
    });
</script>
<!--<footer></footer>-->
</body>
</html>