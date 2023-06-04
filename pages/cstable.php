<?php
	include('connect.php');
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

<script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>
    <form action="cstable.php" method='post' style = "">
    <fieldset>
<legend>Staff List :</legend>
<?php  
$c_List="SELECT * 
			 FROM customerservice
			 ";
$c_ret=mysqli_query($connection,$c_List);
$c_count=mysqli_num_rows($c_ret);

if ($c_count < 1) 
{
	echo "<p>No Staff Records Found.</p>";
}
else
{
?>
	<table id="tableid" class="table table-striped">
	<thead>
	<tr>
		<!-- <th>#</th> -->
        <th>Staff ID</th>
		<th>Page Name</th>
		<th>Admin</th>
		<th>Phone</th>
		<th>Username</th>
		<th>Password</th>
        
	</tr>
	</thead>
	<tbody>
	<?php 
	for($i=0;$i<$c_count;$i++) 
	{ 
		$rows=mysqli_fetch_array($c_ret);
		//print_r($rows);

		$csid=$rows['csid'];
		$pagename=$rows['pageName'];
		$adminname=$rows['adminName'];
		$phone=$rows['phone'];
		$username=$rows['userName'];
		$password=$rows['password'];

		echo "<tr>";
		// echo "<td>" . ($i + 1) ."</td>";
		echo "<td>$csid</td>";
		echo "<td>$pagename</td>";
		echo "<td>$adminname</td>";
		echo "<td>$phone</td>";
		echo "<td>$username</td>";        
		echo "<td>$password</td>";
		echo "<td>
			  <a href='staffupdate.php?csid=$csid'>Update</a> 
			  </td>";
		echo "<td>
			  <a href='piechoose.php?csid=$csid'>Rating</a> 
			  </td>";
		echo "</tr>";
	}
	 ?>
	 </tbody>
	</table>
    <input type="submit" value="Add New Page" class="btn btn-secondary" name="btnadd"> 
<?php
}
?>
</fieldset>
</form>
    
</body>
</html>