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
$id = $_SESSION['id'];
$name = $_SESSION['name'];
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
					<a href="applyleave.php" class="navbar-link">Apply Leave</a>
				</li>

				<li href="#" class="nav-link">
					<a href="viewhistory.php" class="navbar-link">View History</a>
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
					<a href="../logout.php" class="navbar-brand ">Logout</a>
			</div>
		</nav>	

		<!--Header-->
		<header id="margin-l" class="header py-2 text-white" style=" font-family: 'Didact Gothic'; background-color: #F29472; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-5">
						<h1><i class="fa fa-user-secret"></i> Staff Panel </h1>
					</div>
				</div>
			</div>
		</header>

		<!-- Button section-->
		<section id="sections" class="py-3 mb-1 bg-faded">
			<div class="container">
				<div class="row">
					<div class="col-md-3"> </div>
					<div class="col-md-2">
						<a href="profile.php" class="button-profile" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-users"></i>My Profile</a>
					</div>
					<div class="col-md-2">
						<a href="applyleave.php" class="button-pending" style="text-decoration:none;" data-toggle="modal" ><i class="fa fa-spinner"></i>Apply Leave</a>
					</div>
					<div class="col-md-2">
						<a href="viewhistory.php" class="button-approve" style="text-decoration:none;" data-toggle="modal" ><i class="fa fa-check"></i>View History</a>
					</div>
					<div class="col-md"></div>
				</div>
			</div>
		</section>

		<!-- Menu section-->
		<section class="mb-2 bg-faded border shadow-sm rounded" style="margin-top:10px; margin-left: 190px; margin-right: 10px; height:540px; background-color:whitesmoke">
			<div class="container" style="margin-left:50px;">
				<div class="row justify-content-between">
					<!-- Content Area -->


					<?php
						$staffInformation = "SELECT  l.name, l.numDay, l.leavedate, l.leavereason, l.status
											 FROM leaves l				-- To choose the latest(biggest) date -->
											 WHERE l.leavedate = (SELECT MAX(l.leavedate)
											 					  FROM leaves l 
																  WHERE l.name  = '".$name."' ) ";

						mysqli_select_db($conn, "simpleleavedb");
						$staffInformationResult = mysqli_query($conn, $staffInformation);
						//$result = mysqli_fetch_assoc($staffInformationResult)

					?>
					<?php
					if (mysqli_num_rows($staffInformationResult) > 0) {	// to determine whether there is a row returned by the query 
						while ($result = mysqli_fetch_assoc($staffInformationResult)) {
					?>
						
						<div>
							<!-- Left Side Container ( Personal Information ) -->
							<div class="left-profile border rounded shadow-sm p-4" style="margin-top:20px; height:480px;">
								<!-- Name -->
								<h4 class="profile">Leave Application</h4>
								<br>
								<div class="row">
									<h4 class="profile"> Name </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:90px; width:400px; text-transform:uppercase;"><?php echo $result['name']." "; ?> </div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Duration (days) </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:11px; width:400px; text-transform:uppercase;"><?php echo $result['numDay']." "; ?> </div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Date </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:100px; width:400px; text-transform:uppercase;"><?php echo $result['leavedate']." "; ?> </div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Reason </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:78px; width:400px; text-transform:uppercase;"><?php echo $result['leavereason']." "; ?> </div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"></h4>
									<div style="bg-faded background-color:#FFD3C4; margin-left:88px; width:400px; text-transform:uppercase;">
													<?php 
														if ($result['status'] == 0) {
															echo "<h3 align='center' id='text-pending'>Pending</h3>";
														}
														elseif ($result['status'] == 1){
															echo "<h3 align='center' id= 'text-approve'>Approved</h3>";
														}
														else{
															echo "<h3 align='center' id= 'text-rejected'>Rejected</h3>";
														}
													?> 
									</div>
								</div>
						
					<?php }
					}
					else{	// if the staff did not made any leaves application 
						?>
						
						<div>
							<!-- Left Side Container ( Personal Information ) -->
							<div class="left-profile border rounded shadow-sm p-4" style="margin-top:20px; height:480px;">
								<!-- Name -->
								<h4 class="profile">Leave Application</h4>
								<br>
								<div class="row">
									<h4 class="profile"> Name </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:90px; width:400px; text-transform:uppercase;"> <?php echo "'".$name."'"; ?> </div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Duration (days) </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:11px; width:400px; text-transform:uppercase;">None</div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Date </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:100px; width:400px; text-transform:uppercase;">None</div>
								</div>
								<br>
								<div class="row">
									<h4 class="profile"> Reason </h4>
									<div class = "border border-black rounded p-1" style="background-color:#FFD3C4; margin-left:78px; width:400px; text-transform:uppercase;">None </div>
								</div>
								<br>
								
								<h1 align="center" id="text-rejected"> No application made </h1>

					<?php } ?>
							</div>
						</div>

						
					<div>
                        <div class="left-profile" style="margin-top:20px;">
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

								<div class = "border shadow-sm rounded p-1" style="margin-left:10px; width:250px; height:180px;">
									<h4 align="center" class="profile"> Application </h4>
									<h4 align="center" class="number">
									<?php

										$employee = $conn->query("SELECT name 
																  FROM `leaves` 
																  WHERE  name ='".$name."'")->num_rows;
										echo number_format($employee);
									?>
									</h4>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</section>
</body>

</html>
