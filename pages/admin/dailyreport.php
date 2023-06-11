
<?php
include('../connect.php');
$currentdate = date('Y-m-d');
echo $currentdate;

  $data="SELECT b.*, cs.adminName
    FROM booking b, customerservice cs
  WHERE b.csid = cs.csid 
  ";

$query=mysqli_query($connection,$data);
$bcpunt=mysqli_fetch_array($query);

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
            $rows=mysqli_fetch_array($query);
            $csid=$rows['csid'];
            $csname=$rows['adminName'];
            $ok="SELECT COUNT(bid) as bnum
            FROM  booking
            WHERE csid = $csid and b.assignedDate = $currentdate 
             ";
             $ret1=mysqli_query($connection,$ok);
    
           
                ?>
                <?php echo $csname;?> has <?php echo $ret1;?> bookings tdy<br> 
                <?php
            
               
               
            
        }
        // }
    ?>
</body>
</html>


