<?php  
session_start();
include('../connect.php');
include('adminhead.php');

if(isset($_POST['btnadd'])) 
{
	$sdate=$_POST['txtsdate'];
	$edate=$_POST['txtedate'];
    

    
	echo "<script>window.alert('SUCCESS :Now loading Pie Chart')</script>";
	echo "<script>window.location='datepie.php?sdate=$sdate & edate=$edate'</script>";
	

	// & sdate=$txts & edate=$txte
	

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <div id="body-section">
            <div class="gold-line-container">
                <div class="left-gold-line"></div>
                <div class="left-gold-line"></div>
            </div>
        <div class="gold-line-container">
            <div class="left-gold-line"></div>
            <div class="left-gold-line"></div>
        </div>
        <div class="form-container">

            <div class="form-outer-border">
        <form action="date.php" method="post" enctype="multipart/form-data">
            <h1 class="form-title">Date Customization</h1>
            <div class="row">
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="txtsdate" placeholder="name@example.com">
                        <label for="date">Start Date</label>
                    </div>
                </div>
                <div class=" col-sm-12 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="txtedate" placeholder="phone@example.com" >
                        <label for="date">End Date</label>
                    </div>
                </div>
            </div>
            <button class="u-btn-gold" name="btnadd">
                Register
            </button>

        </form>
            </div>
        </div>

        </div>
      <footer>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
