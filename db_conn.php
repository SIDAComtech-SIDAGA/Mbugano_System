<?php 
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "mbugano_db";


try {
  //  PDO connection
  $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);

  // Set PDO attributes
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // header("Location: ./dashboard/instructor-dashboard.php");
  // echo "Connected to the database successfully";
} catch(PDOException $e) {
  // Handle connection errors
  echo "Connection failed: " . $e->getMessage();
}
?>