<?php
include('include/config.php'); 
include('include/head.php'); 

if (isset($_POST["id"])) 
{
    $id = $_POST["id"];
}

$sql = "DELETE FROM users 
		WHERE userID = '$id'";

if (mysqli_query($conn, $sql)) 
{
	echo " 
	<script> 
		alert('Record deleted successfully');
		window.open('staffList.php','_self');
  	</script>";
}
else 
{
	echo "<script> 
	alert('Failed delete');
	</script>";
}
mysqli_close($conn);

?>
