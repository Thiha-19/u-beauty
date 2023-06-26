<?php  
session_start();
include('../connect.php');
include('adminhead.php');


$pie="SELECT *
FROM customerservice
";

	
	$query=mysqli_query($connection,$pie);
	$data=mysqli_fetch_array($query);
  $pcount=mysqli_num_rows($query); 

  if(isset($_POST['btnadd'])) 
  {
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];
      
    // echo "<script>window.alert('SUCCESS :Now loading Pie Chart')</script>";
    echo "<script>window.location='datepie.php'</script>";
    // echo "<script>window.location='datepie.php? sdate=$sdate & edate=$edate'</script>";  
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
          WHERE csid = $csid 
  
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
        <div class="form-group">
    	<label class="form-label" for="">Starting Date</label>
    	<input class="form-label" type="date" name="txtsdate" required/>
      </div>

	    <div class="form-group">
    	<label class="form-label" for="">Ending Date</label>
    	<input class="form-label" type="date" name="txtedate" required/>
      
     
      <input type="submit" class="u-btn-gold" name="btnadd" value="Choose"/>
      
    <a href="datepie.php? sdate=sdate & edate=$edate" class="btn u-btn-gold table-outer-btn"> Choose </a>
      </div>
        <td>
          <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        </td>
        </td>
      </tr>
    </table>
  </body>
</html>