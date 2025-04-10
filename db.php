<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "event_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
