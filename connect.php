<?php
// Enkel måte å koble til databasen på
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>