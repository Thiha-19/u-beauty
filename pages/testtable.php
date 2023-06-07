<?php

include('connect.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container-fluid">
          <h1 class="navbar-brand logo-text" >U-Beauty</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Procedure</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Staff</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Logout</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    <div id="body-section">
            <div class="gold-line-container">
                <div class="left-gold-line"></div>
                <div class="left-gold-line"></div>
            </div>
        <div class="gold-line-container">
            <div class="left-gold-line"></div>
            <div class="left-gold-line"></div>
        </div>
        <div id="body-flex">
        
            <br>
            <br>
            <div class="table-container ">
            <?php  
             $c_List="SELECT * 
			 FROM customer
			 ";
$c_ret=mysqli_query($connection,$c_List);
$c_count=mysqli_num_rows($c_ret);

if ($c_count < 1) 
{
	echo "<p>No Customer Records Found.</p>";
	 echo "<script>window.location='staffcustomer.php'</script>";
}
else
{}
?>
                <table class="table table-hover " id="table">
                    <thead>
                    <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Addresss</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Dob</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
	for($i=0;$i<$c_count;$i++) 
	{ 
		$rows=mysqli_fetch_array($c_ret);
		//print_r($rows);

		$cid=$rows['cid'];
		$cname=$rows['cName'];
		$email=$rows['email'];
		$job=$rows['job'];
		$address=$rows['address'];
		$phone=$rows['phone'];
		$dob=$rows['dob'];

		echo "<tr>";
        echo "<td scope='row'>" . ($i + 1) ."</td>";
		echo "<td>$cname</td>"; 
		echo "<td>$email</td>";
		echo "<td>$job</td>";
		echo "<td>$address</td>";        
		echo "<td>$phone</td>";
		echo "<td>$dob</td>";
		echo "<td>
			  <a href='customerupdate.php?cid=$cid'>Update</a> 
			  </td>";
		echo "</tr>";
	}
	 ?>
	 </tbody>
     </table>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                   
                    </tbody>
                </table> -->
            </div>
        </div>
        </div>

      <footer>
      </footer>
<!--    set type = text for example it would be hidden-->
    <input type="text" id="cid">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(()=>{
            let dataTable = $('table').DataTable( {
                select: true,
                info:false,
                stateSave: true,
                rowId: 'id',
            } );
            dataTable.on('select', function (e, dt, type, indexes) {
                    let data = dt.row({selected: true}).data()
                    console.log(data); // data[0] = first column data for example customer id

                    $("cid").val(data[0]);// to set the hidden input value
                })
        });
    </script>
</body>
</html>