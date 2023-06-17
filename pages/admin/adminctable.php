<?php
session_start();
include('../connect.php');
include('adminhead.php');

$select="select c.*, b.status
from customer c, booking b
where b.status = 'Confirmed' AND b.cid = c.cid
		    ";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_num_rows($query);
	function countdays($date)   
	{
		 global $return;
		 $olddate =  substr($date, 4); 
		 $newdate = date("Y") ."".$olddate; 
		 $nextyear = date("Y")+1 ."".$olddate; 
		 
		 
			if(strtotime($newdate) > strtotime(date("Y-m-d"))) 
			{
			$start_ts = strtotime($newdate); 
			$end_ts = strtotime(date("Y-m-d"));
			$diff = $end_ts - $start_ts; 
			$n = round($diff / (60*60*24));
			$return = substr($n, 1); 
			return $return; 
			}
			else
			{
			$start_ts = strtotime(date("Y-m-d")); 
			$end_ts = strtotime($nextyear); 
			$diff = $end_ts - $start_ts; 
			$n = round($diff / (60*60*24)); 
			$return = $n; 
			return $return; 
			}
		
		}
        if ($data < 1) 
    {
    }
    else
    {
        for($i=0;$i<$data;$i++) 
	{ 
		$rows=mysqli_fetch_array($query);
		$cid=$rows['cid'];
		$cname=$rows['cName'];
		$dob=$rows['dob'];
		$bd = countdays($dob);
        $currentdate = date('Y-m-d');

		if ($bd<=3)
		{
			?>
			<!-- <?php echo $cname;?>Days left until next birthday:<?php echo $bd;?><br>  -->
			<?php
			$txt=$cname." has a birthday in ".$bd." days at ". $dob;
			$Select="SELECT * FROM noti
            WHERE log='$txt'";
    		$retSelect=mysqli_query($connection,$Select);
    		$Select_Count=mysqli_num_rows($retSelect);
        
    		if ($Select_Count>0) 
        	{

        	}
        	else 
			{
			$insert="INSERT INTO `noti`
			(`log`,`cid`,`createdDate`) 
			VALUES ('$txt','$cid','$currentdate')
			";
			$ret1=mysqli_query($connection,$insert); 
				}
		}
	}
    }
    
	
	

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
    echo "<p>No Customer Records Found.</p>";
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
                <th>phone</th>
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
                echo "<td>$phone</td>";
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
                {"width": "20%", "targets": -1}
            ]
        });
    });
</script>
<!--<footer></footer>-->
</body>
</html>