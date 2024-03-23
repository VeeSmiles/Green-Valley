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

// INSERT operation
function insertUser($conn, $username, $password, $email) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);
    $stmt->execute();
    $stmt->close();
}

// SELECT operation
function selectUser($conn, $username) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        // Output the user data
    }
    $stmt->close();
}

// DELETE operation
function deleteUser($conn, $username) {
    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

// UPDATE operation
function updateUser($conn, $username, $newEmail) {
    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE username = ?");
    $stmt->bind_param("ss", $newEmail, $username);
    $stmt->execute();
    $stmt->close();
}

// Check if the form data is set for INSERT
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    insertUser($conn, $_POST['username'], $_POST['password'], $_POST['email']);
    echo "New records created successfully";
} else {
    echo "Form data is missing.";
}

// You can call the other functions here as needed to demonstrate SELECT, DELETE, and UPDATE

$conn->close();
?>
