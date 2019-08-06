
<?php
$conn= new mysqli("localhost","root","","plexus_erpreg_db");

 
 
if($conn->connect_error)
{
	die("Error: ".$conn->connect_error);
}
 
?>