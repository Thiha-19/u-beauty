<?php

$birthday="2001-11-19";
	$expire_date="2015-01-01";
  // With this function you can calculate on how many days someone has birthday
	function countdays($date)   // declare the function and get the birth date as a parameter
	{
		 $olddate =  substr($date, 4); // use this line if you have a date in the format YYYY-mm-dd.
		 $newdate = date("Y") ."".$olddate; //set the full birth date this year
		 $nextyear = date("Y")+1 ."".$olddate; //set the full birth date next year
		 
		 
			if(strtotime($newdate) > strtotime(date("Y-m-d"))) //check if the birthday has passed this year. In order to check use strotime(). if it has not....
			{
			$start_ts = strtotime($newdate); // set a variable equal to the birthday in seconds (Unix timestamp, check php manual for more information)
			$end_ts = strtotime(date("Y-m-d"));// and a variable equal to today in seconds
			$diff = $end_ts - $start_ts; // calculate the difference of today minus birthday
			$n = round($diff / (60*60*24));// divide the diffence with the seconds of one day to get the dates. Use round() to get a round number.
										//(60*60*24) represents 60 seconds * 60 minutes * 24 hours = 1 day in seconds. You can also directly write 86400
			$return = substr($n, 1); //you need this to get the right value without -
			return $return; // return the value
			}
			else // else if the birthday has past this year
			{
			$start_ts = strtotime(date("Y-m-d")); // set a variable equal to the today in seconds
			$end_ts = strtotime($nextyear); // and a variable with the birtday next year
			$diff = $end_ts - $start_ts; // calculate the difference of next birthday minus today
			$n = round($diff / (60*60*24)); // divide the diffence with the seconds of one day to get the dates.
			$return = $n; // assign the dates to return
			return $return; // return the value
		
			}
		
		}
	
	//With this function you can calculate the dates left until a certain date	
	function expire($expiration_date) // delare the function and get the expiration date as a parameter
	{
		$date=strtotime($expiration_date); // get the expiration date in seconds
		$days_left=ceil(($date-time())/(60*60*24)); // calculate the days left. calculate the expiration date minus the current time in seconds. Devide the difference by the seonds in one day
													// The result number will be the days left.
		return $days_left; //return the value
	}
	
	

?>
<html>
	<head>
		<title>CountDown days</title>
	</head>
	<body>
		Birthday:<?php echo $birthday;?> <br>
		Days left until next birthday:<?php echo countdays($birthday);?><br>
		Expire Date:<?php echo $expire_date;?> <br>
		Days left until expiration:<?php echo expire($expire_date);?><br>
	</body>
</html>