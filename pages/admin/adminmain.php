<?php
session_start();
include('../connect.php');
include('adminhead.php');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <fieldset>
    <form action="main.php">
        <legend>Menu</legend>
        <a href="procedure.php">Procedure add m lr</a><br>
        <a href="staffcustomer.php">Customer add m lr</a><br>
        <a href="customerservice.php">Page add m lr</a><br>
        <a href="booking.php">Booking add m lr</a><br>
        </form>
    </fieldset>
</body>
</html>