<?php
$conn= mysqli_connect("localhost", "Green-Valley", "clubs.html");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."</br>");
    }
    echo "Connection successfully created</br>";

?>