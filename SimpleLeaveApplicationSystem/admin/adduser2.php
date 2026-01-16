<?php
ob_start();
session_start();
include('include/head.php');



if (isset($_POST['signup'])) {
    $name =strtoupper( $_POST['name']);
    $dateofBirth = $_POST['dateofBirth'];
    $telNo = $_POST['telNo'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $state = strtoupper($_POST['state']);
    $street = strtoupper($_POST['street']);
    $postcode = $_POST['postcode'];
    $dID= $_POST['dID'];

    if ($department == "management") {
        // Set the department ID for Management
        $dID = "A002";
    } else {
        // Set the department ID sebab dekat table user we want to senmd id punya department
        switch ($department) {
            case "operations":
                $dID = "A001";
                break;
            case "finance":
                $dID = "A004";
                break;
            case "general":
                $dID = "A003";
                break;
            case "development":
                $dID = "A005";
                break;
            case "UX":
                $dID = "A006";
                break;
            case "TestTeam":
                $dID = "A007";
                break;
            default:
                $dID = "";
                break;
        }
    }

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        echo "<script>alert('Email already exists. Please choose a different email.');</script>";
    } 
    else {
        // Insert the user data into the database
        $insertQuery = "INSERT INTO users (name, dateofBirth, telNo, dID, role, email, password, state, street, postcode,leaveDay)
                        VALUES ('$name', '$dateofBirth', '$telNo', '$dID', '$role', '$email', '$password', '$state', '$street', '$postcode',30)";

if (mysqli_query($conn, $insertQuery)) {
    $_SESSION['email'] = $email; // Store the email in the session for further use if needed
	header("Location: dashboard.php");
    ob_end_flush();
    echo "<script>alert('Successfully signed up!');</script>";
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

    }
}
?>

<body class="signup-page">
    
   <!-- Sidebar -->
		<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" >
			<ul class="nav flex-column text-white w-100">
				<a href="#" class="nav-link h3 text-white my-2"></a>

				<img src="img/logo-utm.png" alt="logo-utm" width="160px" height="50px" style="margin-left:8px; margin-bottom:30px; margin-top:30px;">
			
				<li href="#" class="nav-link">
					<a href="dashboard.php" class="nav-brand ">Home</a>
				</li>

				<li href="#" class="nav-link">
					<a href="addnew2.php" class="navbar-link"> Add New User</a>
				</li>

				<li href="#" class="nav-link">
					<a href="staffList.php" class="navbar-link"> Staff List </a>
				</li>

				<li href="#" class="nav-link">
					<a href="view.php" class="navbar-link"> Application </a>
				</li>
			</ul>
		</div> 

     <!-- Navigation Bar -->
		<nav class="navbar navbar-toggleable-sm navbar-inverse p-0">
			<div class="container" style="margin-left: 190px; margin-right: 10px; height:50px">
				<button class="navbar-toggler" data-target="#mynavbar" data-toggle="collapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a href="dashboard.php" class="navbar-brand ">Simple Online Leave Management</a>
				<a href="../logout.php" class="navbar-brand ">Logout</a>
			</div>
		</nav>	
     
    <!--Header-->
    <header id="margin-l" class="header py-2 text-white" style=" font-family: 'Didact Gothic'; background-color: #bea9df; margin-right:10px;">
        <div class="container">
            <div class="row ">
                <div class="col-md-5">
                    <h1><i class="fa fa-user-secret"></i> Add New User </h1>
                </div>
            </div>
        </div>
    </header>


    <!-- Menu section-->
		<section class=" mb-4 bg-faded border shadow-sm rounded" style="margin-top: 20px; margin-left: 190px; margin-right: 10px; height:600px; background-color:whitesmoke">
			<div>
				<div class="row flex-nowrap">
					<!-- Content Area -->

					<!-- Left Side Container -->
					<div class="left-profile">
                        <!-- Signup Form -->
                        <h4>Personal Information</h4>
                        <br>

                        <div class="row">
                        <form method="POST" action="">
                        </div>
						<br>

						<div class="row">
                            <label for="name" style="width: 120px; text-align: left;">Name:</label>
                            <input type="text" id="name" name="name" required class="form-input-long uppercase"><br>
                            </div>
						<br>

						<div class="row">
                            <label for="dateofBirth" style="width: 120px; text-align: left;">Date of Birth:</label>
                            <input type="date" id="dateofBirth" name="dateofBirth" required class="form-input-long"><br>
                            </div>
						<br>

						<div class="row">
                            <label for="telNo" style="width: 120px; text-align: left;">Telephone Number:</label>
                            <input type="tel" id="telNo" name="telNo" pattern="[0-9]+" required class="form-input-long"><br>
                            </div>
						<br>

					<div class="row">
                        <label for="department" style="width: 120px; text-align: left;">Department:</label>
                        <select id="department" name="department" required class="form-input-long">
                        <option value="">Select department</option>
                        <option value="operations">Operations</option>
                        <option value="management">Management</option>
                        <option value="finance">Finance</option>
                        <option value="general">General</option>
                        <option value="development">Development</option>
                        <option value="UX">UX</option>
                        <option value="TestTeam">Test Team</option>

                    </select><br>
                    </div>
						<br>

						<div class="row">
                        <label for="role" style="width: 120px; text-align: left;">Role:</label>
                    <div>
                        <input type="radio" id="Staff" name="role" value="Staff" required style="margin-left: 10px;">
                        <label for="Staff">Staff</label>
                    </div>
                    <div>
                        <input type="radio" id="Manager" name="role" value="Manager" required style="margin-left: 10px;">
                        <label for="Manager">Manager</label>
                    </div>
                    </div>
						<br>

					<div class="row">
                            <label for="email" style="width: 120px; text-align: left;">Email:</label>
                            <input type="email" id="email" name="email" required class="form-input-long"><br>
                            </div>
						<br>

					<div class="row">
                            <label for="password" style="width: 120px; text-align: left;">Password:</label>
                            <input type="password" id="password" name="password" required class="form-input-long"><br>
                        </div>
			
                     </div>

                     <!-- Right Side Container -->
					<div class="right-profile">
                    <h4>Department Information</h4>
                    <br>
						<!-- Name -->

                        <div class="row">
                            <label for="state" style="width: 120px; text-align: left;">State:</label>
                            <input type="text" name="state" id="state" required class="form-input-long uppercase"><br>
                        </div>
						<br>

						<div class="row">
                            <label for="street" style="width: 120px; text-align: left;">Street:</label>
                            <input type="text" name="street" id="street" required class="form-input-long uppercase"><br>
                            </div>
						<br>

						<div class="row">
                            <label for="postcode" style="width: 120px; text-align: left;">Postcode:</label>
                            <input type="text" name="postcode" id="postcode" required class="form-input-long"><br>
                            </div>
						<br>

                        <br><br>
						<div class="row" style="width: 120px; text-align: left;">
                            <button class="submit" type="submit" name="signup">Sign Up</button>
                        </div>

                        </form>
                        </div>
				</div>	
			</div>
		</section>
</body>

