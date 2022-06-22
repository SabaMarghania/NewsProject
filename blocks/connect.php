<?php
$servername = "localhost";
$username = "id19150626_root";
$password = "I=zl743BaUNYNfdE";
$dbname='id19150626_newsproject';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>