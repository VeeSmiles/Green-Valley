<?php

/* 
** This module illustrates use of the INSERT command object used to
** to write data to the database. in this case, the daat is read 
** from the admissions form and written into the 
** admission table in school DB.   
** The connection and th edata are defined in separate modules,
** and incorporated using to this code using the 'include'. the
** alternative is wruite all the code in one file. 
** ---------Please Note------------
// ** for this module to work without modification:
** 1. your web and SQL server must be running
** 2. Your admission form and all the PHP files must be hosted in the server
** 3. Your admission form fields MUST have names similar to those in dbFields.PHP,
**    That is from txtName to telNumber.
** 4. Your variables MUST have the same name as those in dbFields.PHP
**    That is, from $std_name to $phone
** 5. Your connection object MUST have the same database attributes like those in dbconnection.PHP
** --------Customization------------
** You can customize this files to fit your system if you understand the workings. 
*/

#establish connection
include 'connectdb.php';
#collect values from the form
include 'loginfieldsdb.php';

#define the query string
$sql= "INSERT INTO login_wildlife (username, email, password)VALUES ('$username','$email','$password')";

#test the query
if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);
?>