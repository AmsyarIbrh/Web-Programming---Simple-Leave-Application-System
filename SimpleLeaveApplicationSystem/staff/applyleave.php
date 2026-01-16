<?php
    // Start up your PHP Session. Need to have because we are bringing the session from 
    // one page to another.
    session_start();
    include('include/head.php');
    // If the user is not logged in send him/her to the login form
    if ($_SESSION["Login"] != "YES") 
    {
        header("Location: index.php");
    }

	// Get the session ID of the user
	$id = $_SESSION['id']
?>
<html>
<body>
        <?php
			$sql3 = "SELECT * FROM users
                     INNER JOIN department
                     ON users.dID = department.departmentID 
					 WHERE userID ='".$id."'";

			mysqli_select_db($conn,"simpleleavedb");
			$result3= mysqli_query($conn,$sql3);

			// $row3 consist all of the information based on the session id
			$row3=mysqli_fetch_assoc($result3);
		?>

		<!-- Sidebar -->
		<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" >
			<ul class="nav flex-column text-white w-100">
				<a href="#" class="nav-link h3 text-white my-2"></a>

				<img src="img/logo-utm.png" alt="logo-utm" width="160px" height="50px" style="margin-left:8px; margin-bottom:30px; margin-top:30px;">
			
				<li href="#" class="nav-link">
					<a href="dashboard.php" class="nav-brand ">Home</a>
				</li>

				<li href="profile.php" class="nav-link">
					<a href="profile.php" class="navbar-link">Profile</a>
				</li>

				<li href="#" class="nav-link">
					<a href="total.php" class="navbar-link">Leave Application</a>
				</li>

				<li href="#" class="nav-link">
					<a href="profile.php" class="navbar-link">Application History</a>
				</li>

				<li href="#" class="nav-link">
					<a href="profile.php" class="navbar-link">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Navigation Bar -->
		<nav class="navbar navbar-toggleable-sm navbar-inverse p-0">
			<div class="container" style="margin-left: 190px; margin-right: 10px; height:50px">
				<button class="navbar-toggler">
					<span class="navbar-toggler-icon"></span>
				</button>
					<a href="dashboard.php" class="navbar-brand ">Simple Leave Management System</a>
					<a href="dashboard.php" class="navbar-brand ">Logout</a>
			</div>
		</nav>	

		<!--Header-->
		<header id="margin-l" class="header py-2 text-white" style=" font-family: 'Didact Gothic'; background-color: #F29472; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-5">
						<h1><i class="fa fa-user-secret"></i> Apply Leave </h1>
					</div>
				</div>
			</div>
		</header>

	
		<!-- Menu section-->
		<section class=" p-2 mb-4 bg-faded border shadow-sm rounded" style="margin-top:30px; margin-left: 190px; margin-right: 10px; height:580px; background-color:whitesmoke">
			<div class="container" style="margin-left:50px;">
				<div class="row justify-content-between">
					<!-- Content Area -->
                    <div>
                        <!-- Left Side Container ( Personal Information ) -->
                        <div class="left-profile border rounded shadow-sm p-4">
                            <!-- Name -->
                            <h4 class="profile">Personal Information</h4>
                            <br>
                            <div class="row">
                                <h4 class="profile"> Name </h4>
                                <div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:100px; width:400px; text-transform:uppercase;"><?php echo $row3['name']." "; ?> </div>
                            </div>
                            <br>
                            <div class="row">
                                <h4 class="profile"> Department </h4>
                                <div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:53px; width:400px;"> <?php echo $row3['dName']." "; ?> </div>
                            </div>
                            <br>
                            <div class="row">
                                <h4 class="profile"> Position </h4>
                                <div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:82px; width:400px;"> <?php echo $row3['role']." "; ?> </div>
                            </div>
                        </div>

                        <div class="left-profile p-4" style="margin-top:50px;">
						 	<div class= "row justify-content-around">
							 	<div class = "border shadow-sm rounded p-1" style="width:250px; height:180px;">
								 	<h4 align="center" class="profile"> Leave Quota </h4>
									<?php
										$sql = "SELECT * 
												FROM users
												WHERE userID ='".$id."'";

										mysqli_select_db($conn,"simpleleavedb");
										$result= mysqli_query($conn,$sql);
							
										// $row3 consist all of the information based on the session id
										$row=mysqli_fetch_assoc($result);
									?>
									<h4 align="center" class="number"> <?php echo $row['leaveDay']; ?> </h4>
									<h5 align="center" class="profile"> days </h5>
								</div>

								<div class = "border shadow-sm rounded p-1" style="width:250px; height:180px;">
									<h4 align="center" class="profile"> Application </h4>
									<h4 align="center" class="number">
									<?php
									
										$employee = $conn->query("SELECT name 
																  FROM `leaves` 
																  WHERE  name ='".$row3['name']."'")->num_rows;
										echo number_format($employee);
									?>
									</h4>
								</div>
							</div>
						</div>
					</div>


					<div>
                        <!-- Left Side Container ( Personal Information ) -->
                        <div class="left-profile border rounded shadow-sm p-4" style="height:510px;">
                            <!-- Name -->
                            <h4 class="profile">Leave Application</h4>
                            <br>
                            <div class="row">
                                <h4 class="profile"> Name </h4>
                                <div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:90px; width:400px; text-transform:uppercase;"><?php echo $row3['name']." "; ?> </div>
                            </div>
                            <br>

							<form action="updateleave.php" method="POST" >
								<div class="row">
                                	<h4 class="profile"> Duration (days) </h4>
                            		<input type="text" id="length" name="length" required class="form-input-long border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:13px; width:400px;"><br>
								</div>
                            	<br>
								<div class="row">
                                	<h4 class="profile"> Date </h4>
                            		<input type="date" id="dateofLeave" name="dateofLeave" required class="form-input-long border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:100px; width:400px;"><br>
								</div>
                            	<br>
                            	<div class="row">
                                	<h4 class="profile"> Reason </h4>
									<textarea size="200" id="reason" name="reason" required class="form-input-long border border-black rounded p-1" rows="7" cols="50" style="background-color:#FFD3C4; margin-left:80px; width:400px;"></textarea><br>
                            	</div>

								<!-- Submit Button  -->
								<div class="col-md-4">
									<button type="submit" class="button-approve" style="text-decoration:none; margin-top:10px; margin-left:200px;"> Submit </button>
								</div>
							</form>
	
                        </div>
					</div>
				</div>
			</div>
		</section>
</body>

</html>
