<?php 

// Include the database connection file
include_once 'connectdb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $interests = $_POST['interests'];
    $location = $_POST['location'];
    $gender = $_POST['gender'];
    $role = $_POST['role']; 

    $sql = "INSERT INTO users (name, email, interests, location, gender,role) VALUES ('$name','$email','$password','$role')";


    if (mysqli_query($con, $sql)) {
        echo "A new record has been created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      #disconnect
      mysqli_close($con);
}

?>