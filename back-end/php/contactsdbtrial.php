<?php
$conn = mysqli_connect("localhost", "Green-Valley", "contact.html");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."</br>");
    }
    echo "Connection successfully created</br>";

?>