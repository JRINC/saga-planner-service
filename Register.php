<?php
header('Access-Control-Allow-Origin: *');
$useremail = $_GET['femail'];
$password = $_GET['fpass'];
// $con=mysqli_connect("localhost","jrinc","","c9");
$con=mysqli_connect(getenv('OPENSHIFT_MYSQL_DB_HOST'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'),"sagaplannerdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// $qz = "SELECT id, email FROM members where username=".$username." and password=".$password."" ; 
$qz = "INSERT INTO members (username, email, password) VALUES (".$useremail.", ".$useremail.", ".$password.")" ; 
// printf($qz);
$qz = str_replace("\'","",$qz); 
$result = mysqli_query($con,$qz);
echo $result;
mysqli_close($con);
?>