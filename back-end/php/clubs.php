<!-- clubs.php -->
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
function insertUser($conn, $name, $email, $interests, $location, $gender) {
    $stmt = $conn->prepare("INSERT INTO user_registrations (name, email, interests, location, gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $interests, $location, $gender);
    $stmt->execute();
    $stmt->close();
}

// SELECT operation
function selectUser($conn, $name) {
    $stmt = $conn->prepare("SELECT * FROM user_registrations WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        // Output the user data
    }
    $stmt->close();
}

// DELETE operation
function deleteUser($conn, $name) {
    $stmt = $conn->prepare("DELETE FROM user_registrations WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->close();
}

// UPDATE operation
function updateUser($conn, $name, $newEmail) {
    $stmt = $conn->prepare("UPDATE user_registrations SET email = ? WHERE name = ?");
    $stmt->bind_param("ss", $newEmail, $name);
    $stmt->execute();
    $stmt->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $interests = trim($_POST['interests']);
    $location = trim($_POST['location']);
    $gender = trim($_POST['gender']);

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($interests) || empty($location) || empty($gender)) {
        // Handle error - inform user they did not fill out all fields
        // Redirect back to the form or display an error message
        echo "All fields are required.";
    } else {
        // Call the insert function
        insertUser($conn, $name, $email, $interests, $location, $gender);
        echo "Registration successful!";
    }
    
    // You can call the other functions here as needed to demonstrate SELECT, DELETE, and UPDATE
}

// Close connection
$conn->close();
?>
