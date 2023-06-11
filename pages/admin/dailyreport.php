
<?php
include('../connect.php');
$data="SELECT b.*, cs.adminName
FROM booking b, customerservice cs
WHERE b.csid = cs.csid 
";

$query=mysqli_query($connection,$data);
$data=mysqli_fetch_array($query);

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
            for($i=0;$i<$data;$i++) 
        { 
            $currentdate = date('Y-m-d');
            

            $rows=mysqli_fetch_array($query);
            $csid=$rows['csid'];
            $csname=$rows['adminName'];
            $ok="SELECT COUNT(b.bid) as bnum
            FROM  booking b, customerservice cs
            WHERE b.csid = $csid and b.assignedDate = $currentdate and b.csid = cs.csid
             ";
             
             $ret=mysqli_query($connection,$ok);
             $show = mysqli_fetch_array($ret);
           
                ?>
                <?php echo $csname?> has <?php echo $show?> bookings tdy<br> 
                <?php
            
               
               
            
        }
        // }
    ?>
</body>
</html>


