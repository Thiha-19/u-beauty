<?php  
session_start();
include('connect.php');
include('adminhead.php');

if(isset($_GET['csid']))
{
  $csid = $_GET['csid'];

  $name="SELECT cs.adminname
  FROM booking b, customerservice cs
  WHERE b.csid = cs.csid and b.csid = $csid
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
//   $List2="SELECT SUM(teamwork) as team
//   FROM  rating
//   WHERE date between '$sdate' and '$edate' and eid = $eid  
//   ";
//   $List3="SELECT SUM(execution) as exe
//   FROM  rating
//   WHERE date between '$sdate' and '$edate' and eid = $eid  
//   ";
//   $List4="SELECT SUM(adaptability) as ada
//   FROM  rating
//   WHERE date between '$sdate' and '$edate' and eid = $eid  
//   ";
//   $List5="SELECT SUM(courage) as cou
//   FROM  rating
//   WHERE date between '$sdate' and '$edate' and eid = $eid  
//   ";

  $ret1=mysqli_query($connection,$List1);
  $ret2=mysqli_query($connection,$List2);
  // $ret3=mysqli_query($connection,$List3);
  // $ret4=mysqli_query($connection,$List4);
  // $ret5=mysqli_query($connection,$List5);
  
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
          $show1 = mysqli_fetch_array($ret1);
          $show2 = mysqli_fetch_array($ret2);
          // $show3 = mysqli_fetch_array($ret3);
          // $show4 = mysqli_fetch_array($ret4);
          // $show5 = mysqli_fetch_array($ret5);
            echo "['$cname', ".$show1['bnum']."],";
            echo "['Other', ".$show2['bnum1']."],";
            // echo "['Execution', ".$show3['exe']."],";
            // echo "['Adaptability', ".$show4['ada']."],";
            // echo "['Courage', ".$show5['cou']."]";

            // echo "[Communication, ".$show['communication']."],";
          
      ?>
        ]);

        var options = {
          title: 'Employee Rating Chart',
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
        <fieldset class="text-center">
                <!-- <legend>Employee Info :</legend>
                <input class="form-label" type="hidden" name="txteid" value="<?php echo $eid ?>" readonly/>
                <div class="form-group">
                <label class="form-label" for="">Name</label>
                <input class="form-label" type="text" name="txtname" value="<?php echo $name ?>" readonly/>
                </div>

                <div class="form-group">
                <label class="form-label" for="">Role</label>
                <input class="form-label" type="text" name="txtrole" value="<?php echo $role ?>" readonly/>
                </div>

                <div class="form-group">
                <label class="form-label" for="">Department</label>
                <input class="form-label" type="text" name="txtname" value="<?php echo $dept ?>" readonly/>
                </div>
                </fieldset> -->
        <td>
          <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
        </td>
        </td>
      </tr>
    </table>
  </body>
</html>