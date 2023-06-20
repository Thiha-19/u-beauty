<?php
session_start();
include('../connect.php');
include('staffhead.php');

if (isset($_SESSION['csid'])) {
    $csid = $_SESSION['csid'];

    $select = "SELECT `csid`
		FROM `customerservice` 
		WHERE csid = '$csid'
		";
    $query = mysqli_query($connection, $select);
    $data = mysqli_fetch_array($query);
    $csid = $_SESSION['csid'];
} else {

}
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
</head>
<body>

<?php
$c_List = "SELECT DISTINCT n.*, cs.csid, c.csid
FROM noti n, customerservice cs, customer c
WHERE cs.csid = c.csid AND cs.csid = '$csid' AND c.cid = n.cid
			 ";
$c_ret = mysqli_query($connection, $c_List);
$c_count = mysqli_num_rows($c_ret);

if ($c_count < 1) {
    echo '<h1 class="form-title mt-5" style="color:var(--theme-red);">No Notification Records Found</h1>';

} else {
    ?>
<div id="body-section">
    <h1 class="form-title mt-5">Notifications</h1>
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
</div>
<?php
include('../footer.php'); ?>

<script>
    $(document).ready(function () {
        $('#tableid').DataTable();
    });
</script>
<!--<footer></footer>-->
</body>
</html>