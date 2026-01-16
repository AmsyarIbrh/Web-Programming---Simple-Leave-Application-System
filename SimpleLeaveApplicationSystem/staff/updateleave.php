<?php
    session_start();

    //establish connection to database
    include('include/config.php');
    include('include/head.php');

    // Get the session ID of the user
	$id = $_SESSION['id'];
    
    $sql = "SELECT * 
            FROM users
            WHERE userID ='".$id."'";

    mysqli_select_db($conn,"simpleleavedb");
    $result= mysqli_query($conn,$sql);

    // $row3 consist all of the information based on the session id
    $row=mysqli_fetch_assoc($result);

    //Q1: access the fieldname from edit_guest-s.php
    //decide whether you should use $_POST or $_GET
    $name = $row['name'];
    $email = $row['email'];
    $dID = $row['dID'];
    $leavedate = $_POST["dateofLeave"];
    $leavereason = $_POST["reason"];
    $status = "0";
    $duration = $_POST["length"];

    // Insert the data inside the leaves table
    $insert = "INSERT INTO leaves (name, email, dID, leavedate, leavereason, status,numDay)
               VALUES ('$name','$email', '$dID', '$leavedate', '$leavereason', '$status', '$duration')";

    // Calculate the updated quota of leave
    $quota = $row['leaveDay'] - $duration;

    $update = "UPDATE users
               SET leaveDay = '$quota'
               WHERE userID ='".$id."'";
    
    if (mysqli_query($conn, $insert)) {
        // Execute the update query
        if (mysqli_query($conn, $update)) {
            echo "<script> 
                    alert('Leave application recorded successfully');
                    window.open('applyleave.php','_self');
                  </script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
            echo "<script>alert('Failed to record the information!');</script>";
        }
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
        echo "<script>alert('Failed to record the information!');</script>";
    }
    
    mysqli_close($conn);
?>

</html>