<?php
	
	$db_host='localhost';
	$db_user='root';
	$db_pass='';
	$db_name='simpleleavedb'; //change the name of the database to your database name
	
	 // login to MySQL Server from PHP
	 $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); 

     // Check if the database is not connected
     if(!$conn)
     {
        echo "Database simpLeaveDB is not connected";
     }
?>