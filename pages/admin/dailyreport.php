
<?php
include('../connect.php');
$data1="SELECT *
FROM customerservice 
";

$query=mysqli_query($connection,$data1);
$data1=mysqli_fetch_array($query);
$dcount=mysqli_num_rows($query);


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
            for($i=0;$i<$dcount;$i++) 
        { 
            $currentdate = date('Y-m-d');
            

            $csid=$data1['csid'];
            $csname=$data1['adminName'];
            $data1=mysqli_fetch_array($query);

            $ok="SELECT distinct COUNT(b.bid) as bnum
            FROM  booking b, customerservice cs
            WHERE b.csid = '$csid' and b.assignedDate = '$currentdate' and b.csid = cs.csid
             ";
             
             $ret=mysqli_query($connection,$ok);
             $show = mysqli_fetch_array($ret);
           
                ?>
                <?php echo $csname?> has <?php echo $show['bnum']?> bookings tdy<br> 
                <?php
            
               
               
            
        }
        // }
    ?>
</body>
</html>


