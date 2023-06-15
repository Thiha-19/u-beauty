<?php
session_start();
include('../connect.php');
include('adminhead.php');


if (isset($_POST['btnadd'])) {
    echo "<script>window.location='staffcustomer.php'</script>";
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
<body>

<?php
$c_List = "SELECT * 
			 FROM customer
			 ";
$c_ret = mysqli_query($connection, $c_List);
$c_count = mysqli_num_rows($c_ret);

if ($c_count < 1) {
    echo '<h1 class="form-title mt-5" style="color:var(--theme-red);">No Customer Records Found.</h1>';
} else {
?>
<div id="body-section">
    <h1 class="form-title mt-5">Customer List</h1>
    <div class="table-container mb-5">
        <table id="tableid" class="table ">
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
                <th>Actions</th>

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
                echo "<td class='d-flex '>
			  <a href='admincdetail.php?cid=$cid' class='u-btn-gold table-btn'>Detail</a>
			  <a href='../cdelete.php?cid=$cid'class='u-btn-gold table-btn table-btn-red'>Delete</a> 
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