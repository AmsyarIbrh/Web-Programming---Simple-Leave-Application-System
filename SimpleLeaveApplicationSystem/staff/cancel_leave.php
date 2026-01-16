<?php

//input buffer when redirect to the page
ob_start();
// Start the session and include necessary files
session_start();
include('include/head.php');

// Check if the leave ID is provided through the query string
if (isset($_GET['id'])) {
    // Get the leave ID
    $leaveID = $_GET['id'];

    // Delete the leave record from the database
    $deleteSQL = "DELETE FROM leaves WHERE leaveID = '".$leaveID."'";
    mysqli_select_db($conn, "simpleleavedb");
    mysqli_query($conn, $deleteSQL);

    // Redirect back to the leave history page
    header('Location: viewhistory.php');
    ob_end_flush();
    exit;
} else {
    // If the leave ID is not provided, redirect back to the leave history page
    header('Location: viewhistory.php');
    exit;
}
?>
