<?php
include('connect.php');
include('header.php');

if (isset($_POST['btnadd'])) {
    echo "<script>window.location='customerservice.php'</script>";
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
			 FROM noti
			 ";
$c_ret = mysqli_query($connection, $c_List);
$c_count = mysqli_num_rows($c_ret);

if ($c_count < 1) {
    echo "<p>No Staff Records Found.</p>";
    echo "<script>window.location='adminmain.php'</script>";

} else {
    ?>
    <h1 class="form-title">Notifications</h1>
    <div class="table-container ">
        <table id="tableid" class="table">
            <thead>
            <tr>
                <!-- <th>#</th> -->
                <th>Notification</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < $c_count; $i++) {
                $rows = mysqli_fetch_array($c_ret);
                //print_r($rows);

                $noti = $rows['log'];

                echo "<tr>";
                // echo "<td>" . ($i + 1) ."</td>";
                echo "<td>$noti</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>

<?php
include('footer.php'); ?>

<script>
    $(document).ready(function () {
        $('#tableid').DataTable();
    });
</script>
<!--<footer></footer>-->
</body>
</html>