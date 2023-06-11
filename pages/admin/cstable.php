<?php
	include('../connect.php');
	include('adminhead.php');

    if(isset($_POST['btnadd'])) 
{
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
<body >

<?php  
$c_List="SELECT * 
			 FROM customerservice
			 ";
$c_ret=mysqli_query($connection,$c_List);
$c_count=mysqli_num_rows($c_ret);

if ($c_count < 1) 
{
	echo "<p>No Staff Records Found.</p>";
    echo "<script>window.location='adminmain.php'</script>";

}
else
{
?>
    <h1 class="form-title">Customer Registration</h1>
    <div class="table-container ">
        <table id="tableid" class="table">
            <thead>
            <tr>
                <!-- <th>#</th> -->
                <th>Staff ID</th>
                <th>Page Name</th>
                <th>Admin</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Password</th>
                <th>Bookings</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <?php
	for($i=0;$i<$c_count;$i++) 
	{
        $rows = mysqli_fetch_array($c_ret);
        //print_r($rows);

        $csid = $rows['csid'];
        $pagename = $rows['pageName'];
        $adminname = $rows['adminName'];
        $phone = $rows['phone'];
        $username = $rows['userName'];
        $password = $rows['password'];

        $List1 = "SELECT COUNT(bid) as bnum
  FROM  booking
  WHERE csid = $csid 
  
  ";
        $ret1 = mysqli_query($connection, $List1);
        $show1 = mysqli_fetch_array($ret1);

        echo "<tr>";
        // echo "<td>" . ($i + 1) ."</td>";
        echo "<td>$csid</td>";
        echo "<td>$pagename</td>";
        echo "<td>$adminname</td>";
        echo "<td>$phone</td>";
        echo "<td>$username</td>";
        echo "<td>$password</td>";
        echo "<td>" . $show1['bnum'] . "</td>";
        echo "<td>
			  <a href='staffupdate.php?csid=$csid'>Update</a> 
			  <a href='piechoose.php?csid=$csid'>Rating</a> 
			  <a href='sdelete.php?csid=$csid'>Delete</a> 
			  </td>";
    }
            ?>
            </tbody>
        </table>
    </div>
    <a href="customerservice.php" class="btn btn-secondary">Add New Page </a>
    <?php
}
?>

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