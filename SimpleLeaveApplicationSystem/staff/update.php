<?php
    session_start();
    include('include/head.php');

    // Get the session ID of the user
    $id = mysqli_real_escape_string($conn, $_SESSION['id']);

    mysqli_select_db($conn, "simpleleavedb");

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $telno = mysqli_real_escape_string($conn, $_POST['telno']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

    // Input validation
    if (!empty($name) && !empty($dob) && !empty($telno) && !empty($email) && !empty($password) && !empty($state) && !empty($street) && !empty($postcode)) {
        // Prepare the SQL statement
        $sql = "UPDATE users
                SET name = '$name', dateofBirth = '$dob', telNo = '$telno', email = '$email', password = '$password', state = '$state', street = '$street', postcode = '$postcode'
                WHERE userID = '$id'";

        $run = mysqli_query($conn,$sql);
		
        if($run == true)
        {
            echo "<script> 
                    alert('Information Updated');
                    window.open('profile.php','_self');
                </script>";
        }
    }
    else
    {
        echo "<script> 
        alert('Failed to save. All field must be filled!');
        window.open('updateprofile.php');
        </script>";
    }

    // Close the connection
    mysqli_close($conn);
?>
