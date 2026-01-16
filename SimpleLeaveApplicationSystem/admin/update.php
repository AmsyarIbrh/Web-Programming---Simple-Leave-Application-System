<?php

//establish connection to database
include('include/config.php'); 
include('include/head.php'); 

//checking the fieldname id is set and not null
//if null, you can your own js script that shows alert box or error message
if (isset($_POST["id"])) {
    $id = $_POST["id"];
}

//Q1: access the fieldname from edit_guest-s.php
//decide whether you should use $_POST or $_GET
$name = $_POST["name"];
$departmentID = $_POST["department"];
$email = $_POST["email"];
$password =$_POST["password"];
$position =$_POST["position"];

//Q2: update table users according to id using UPDATE
$sql = "UPDATE users SET name = '$name', dID = '$departmentID',
        email = '$email', 
        password = '$password', 
        Role = '$position' 
        WHERE userID = $id"; 

if (mysqli_query($conn, $sql)) {
   echo 
    "<script> 
    alert('Record updated successfully');
    window.open('staffList.php','_self');
    </script>";
   } else {
   echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

</html>