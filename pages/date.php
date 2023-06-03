<?php

$dob="2001-11-19";
  
	function countdays($date)   
	{
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
	
	

?>
<html>
	<head>
		<title>CountDown days</title>
	</head>
	<body>
		Birthday:<?php echo $dob;?> <br>
		Days left until next birthday:<?php echo countdays($dob);?><br>
	</body>
</html>