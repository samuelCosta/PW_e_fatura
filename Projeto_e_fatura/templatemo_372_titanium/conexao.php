<?php
global $con;

 $con = mysqli_connect("localhost","root","","bdefatura");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>
