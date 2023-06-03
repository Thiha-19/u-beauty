<?php
 echo "<script>window.alert('Logged Out Successfully!!')</script>";
 echo "<script>window.location='index.php'</script>";
 session_start();
 session_destroy();
?>