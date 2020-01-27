<meta charset="UTF-8">
<?php
require "config/connection.php";

$sql = "DELETE FROM students WHERE stdID='".$_GET["stdID"]."' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

ini_set('display_errors', 1);
error_reporting(E_ALL);
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "window.location = 'index.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>