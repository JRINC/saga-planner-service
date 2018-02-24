<?php
header('Access-Control-Allow-Origin: *');
$username = $_GET['fname'];
$password = $_GET['fpass'];
// $con=mysqli_connect("localhost","jrinc","","c9");
$con=mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),"sagaplannerdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// $qz = "SELECT id, email FROM members where username=".$username." and password=".$password."" ; 
$qz = "SELECT id, email FROM members where email=".$username." and password=".$password."" ; 
//printf($qz);
$qz = str_replace("\'","",$qz); 
$result = mysqli_query($con,$qz);
while($row = mysqli_fetch_array($result))
  {
      echo $row['id'];
    //   echo $row['email'];
  }
mysqli_close($con);
?>