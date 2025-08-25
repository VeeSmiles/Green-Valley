<?php
/*
** This module reads data from the form post method
** a field at a time (array style element retrieval)
** and assigns it to corresponding variables.
** The variables become the values in query string 
** VALUES section of the INSERT command
*/
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];


echo "Data from the form picked successfully</br>";
?>