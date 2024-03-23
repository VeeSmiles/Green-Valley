<?php
$servername = "localhost";
$dbUsername = "root"; // default username for XAMPP
$dbPassword = ""; // default password for XAMPP
$dbname = "gv_users"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is set
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // Set parameters and execute
    $username = $_POST['username'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];
    $stmt->execute();

    echo "New records created successfully";

    $stmt->close();
} else {
    echo "Form data is missing.";
}

$conn->close();
?>
