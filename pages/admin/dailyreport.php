<?php
include('../connect.php');
include('adminhead.php');
$currentdate = date('Y-m-d');
$query = "SELECT *
FROM booking b, customerservice cs
WHERE b.csid = cs.csid AND b.assignedDate = '$currentdate'
";

$res = mysqli_query($connection, $query);
$data1 = mysqli_fetch_array($res);
$dcount = mysqli_num_rows($res);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// if ($data < 1)
// {
// echo "<p>No Booking Records Found for Today.</p>";
// echo "<script>window.location='booking.php'</script>";
// }
// else
// {

// }
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


<div id="body-section">
    <h1 class="form-title mt-5">Daily Report</h1>
    <div class="table-container mb-5">
        <table id="tableid" class="table ">
            <thead>
            <tr>
                <!-- <th>#</th> -->

                <th>Page Name</th>
                <th>Booking Date</th>
                <th>Bookings Count</th>

            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < $dcount; $i++) {

                $csid = $data1['csid'];
                $csname = $data1['adminName'];
                $pname = $data1['pageName'];
                $data1 = mysqli_fetch_array($res);

                $bookingCount = "SELECT distinct COUNT(b.bid) as bnum
            FROM  booking b, customerservice cs
            WHERE b.csid = '$csid' and b.assignedDate = '$currentdate' and b.csid = cs.csid
             ";

                $ret = mysqli_query($connection, $bookingCount);
                $show = mysqli_fetch_array($ret);
                echo "<tr>";
                echo "<td>" . $data1["pageName"] . "</td>";
                echo "<td>" . $data1["date"] . "</td>";
                echo "<td>" . $show["bnum"] . "</td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
<?php
include('../footer.php'); ?>

<script>
    $(document).ready(function () {
        $('#tableid').DataTable({
            order: [[0, 'asc']],
            rowGroup: {
                dataSrc: [0]
            },
            "columnDefs": [
                {"width": "16%", "targets": -1}
            ]
        });
    });
</script>
</body>
</html>


