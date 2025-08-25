<?php
/*
** This module reads data from the form post method
** a field at a time (array style element retrieval)
** and assigns it to corresponding variables.
** The variables become the values in query string 
** VALUES section of the INSERT command
*/

if  (isset($_POST['name']))
    $name=$_POST['name'];
else
    $name='';
if (isset($_POST['email']))
    $email=$_POST['email'];
else
    $email= '';
if (isset($_POST['interests']))
    $interests=$_POST['interests'];
else
    $interests= '';
if (isset($_POST["location"]))
    $location=$_POST['location'];
else
    $location= '';
if (isset($_POST['gender']))
    $gender=$_POST['gender'];
else
    $gender= '';

echo "Data from the form picked successfully</br>";

#establish connection
include 'connectdb.php';
#collect values from the form


#define the query string
$sql = "SELECT name FROM clubs_register WHERE gender='female' ";
#$sql = "SELECT name FROM clubs_register";
#Test the query
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
// output data of each row
	$count=1;
	echo "<table border=0 align='center' width=40% height=60%>";
	echo "<tr bgcolor='lightblue'><td>Name</td><td>Name</td></tr>";
	
	while($row = $result->fetch_assoc()) 
	{
		echo "<tr bgcolor='lightblue'><td>".$count."</td><td>".$row["name"]."</td></tr>";
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
