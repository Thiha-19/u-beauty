<?php  
session_start();
include('../connect.php');
include('adminhead.php');


if(isset($_GET['sdate']))
{
  $sdate = $_GET['sdate'];
  $edate = $_GET['edate'];
$pie="SELECT *
FROM customerservice
";

	
	$query=mysqli_query($connection,$pie);
	$data=mysqli_fetch_array($query);
  $pcount=mysqli_num_rows($query); 

}
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
        for($i=0;$i<$pcount;$i++)
        {
          $csid=$data['csid'];
          $pname=$data['pageName'];
          $data=mysqli_fetch_array($query);

  
          $List1="SELECT COUNT(bid) as bnum
          FROM  booking
          WHERE csid = $csid and assignedDate between '$sdate' and '$edate'
  
          ";
          

          $ret1=mysqli_query($connection,$List1);
          $show1 = mysqli_fetch_array($ret1);
            echo "['$pname', ".$show1['bnum']."],";
        }
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