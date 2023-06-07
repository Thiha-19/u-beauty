<?php
    include('connect.php');
    $select="select * from customer
		    ";
	
	$query=mysqli_query($connection,$select);
	$data=mysqli_num_rows($query);
    $cname=$data['cName'];
    $dob=$data['dob'];
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
	echo "<p>No Booking Records Found.</p>";
	echo "<script>window.location='booking.php'</script>";
    }
    else
    {
        for($i=0;$i<$data;$i++) 
	{ 
		countdays();
    }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        Birthday:<?php echo $dob;?> <br>
		Days left until next birthday:<?php echo countdays($dob);?><br>
</body>
</html>