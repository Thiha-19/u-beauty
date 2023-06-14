<?php  
session_start();
include('../connect.php');
include('adminhead.php');

$data="SELECT cs.*, b.*
FROM booking b, customerservice cs
WHERE b.csid = cs.csid
";

	
	$query=mysqli_query($connection,$name);
	$data=mysqli_fetch_array($query);
  $cname=$data['adminname'];

  
  $List1="SELECT COUNT(bid) as bnum
  FROM  booking
  WHERE csid = $csid 
  
  ";
  $List2="SELECT COUNT(bid) as bnum1
  FROM  booking
  WHERE csid != $csid 
  
  ";

  $ret1=mysqli_query($connection,$List1);
  $ret2=mysqli_query($connection,$List2);
 


   


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['type', 'date'],
          <?php
          $show1 = mysqli_fetch_array($ret1);
          $show2 = mysqli_fetch_array($ret2);
            echo "['$cname', ".$show1['bnum']."],";
            echo "['Other', ".$show2['bnum1']."],";
      ?>
        ]);

        var options = {
          title: 'Booking Per Page',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <table>
      <tr>
        <td>
        <td>
          <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        </td>
        </td>
      </tr>
    </table>
  </body>
</html>