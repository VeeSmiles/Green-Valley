<?php
/* Module Creation
** Author: Karari E.Karari
** Date: 04/03/2024
** Purpose: Training
*/

/* Module Description
** This module illustrates use of the SELECT command which is used
** to read data from the database. in this case, the data is read 
** from the admission table and embedd into html 
** to make the admission report viewable by the user.   
** The connection and the data are defined in separate modules,
** and incorporated using to this code using the 'include'. the
** alternative is write all the code in one file. 
** ---------Please Note------------
// ** for this module to work without modification:
** 1. your web and SQL server must be running
** 2. Files must be hosted in the server
** 3. Fields MUST have names similar to those in the admission table
** 4. Your connection object MUST have the same database attributes like those in dbconnection.PHP
** --------Customization------------
** You can customize this files to fit your system if you understand the workings. 
*/

#establish connection
include 'dbconnection.php';
#collect values from the form


#define the query string
$sql = "SELECT std_name FROM admission WHERE gender='male' ";
#$sql = "SELECT std_name FROM admission";
#Test the query
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
// output data of each row
	$count=1;
	echo "<table border=0 align='center' width=40% height=60%>";
	echo "<tr bgcolor='lightblue'><td>S.Num</td><td>Name</td></tr>";
	
	while($row = $result->fetch_assoc()) 
	{
		echo "<tr bgcolor='lightblue'><td>".$count."</td><td>".$row["std_name"]."</td></tr>";
		$count++;
	}
	echo "</table>";
	echo "</br>Report succefully generated as shown above";
} else 
{
  echo "0 results";
}

#disconnect
mysqli_close($conn);
?>