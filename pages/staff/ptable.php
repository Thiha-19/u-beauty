<?php
	include('../connect.php');
	include('staffhead.php');

    if(isset($_POST['btnpro'])) 
{
    echo "<script>window.location='procedure.php'</script>";
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
$c_List="SELECT * 
			 FROM `procedure`
			 ";
$c_ret=mysqli_query($connection,$c_List);
$c_count=mysqli_num_rows($c_ret);

if ($c_count < 1) 
{
	echo '<h1 class="form-title mt-5" style="color:var(--theme-red);">No Procedure Records Found.</h1>';
}
else
{
?>
<div id="body-section">
    <h1 class="form-title mt-5">Procedure List</h1>
    <div class="table-container mb-5">
        <table id="tableid" class="table table-striped">
            <thead>
            <tr>
                <th>Number</th>
                <th> ID</th>
                <th>Procedure Name</th>

            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0; $i<$c_count; $i++) {
                $rows=mysqli_fetch_array($c_ret);
                //print_r($rows);

                $pid=$rows['pid'];
                $pname=$rows['pName'];

                echo "<tr>";
                echo "<td>" . ($i + 1) ."</td>";
                echo "<td>$pid</td>";
                echo "<td>$pname</td>";
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
        $('#tableid').DataTable({
            "columnDefs": [
                // {"width": "25%", "targets": -1}
            ]
        });
    });
</script>
<!--<footer></footer>-->
</body>
</html>