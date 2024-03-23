<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP
$dbname = "gv_users"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);

// Set parameters and execute
$username = $_POST['username'];
$password = $_POST['password']; // Consider hashing the password before storing it
$email = $_POST['email'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
