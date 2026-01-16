<?php
// Start up your PHP Session. Need to have because we are bringing the session from 
// one page to another.
session_start();
include('include/head.php');
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") {
	header("Location: index.php");
}

?>
<html>
<body>
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
					<a href="pending.php" class="navbar-link">Pending Leave</a>
				</li>

				<li href="#" class="nav-link">
					<a href="approved.php" class="navbar-link">Approved Leave</a>
				</li>

				<li href="#" class="nav-link">
					<a href="view.php" class="navbar-link">Total Leaves</a>
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
		<header id="margin-l" class="header py-2 text-white" style=" font-family: 'Didact Gothic'; background-color: #A7C7E7; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-5">
						<h1><i class="fa fa-user-secret"></i> Manager Panel </h1>
					</div>
				</div>
			</div>
		</header>

		<!-- Button section-->
		<section id="sections" class="py-4 mb-4 bg-faded">
			<div class="container">
				<div class="row">
					<div class="col-md-3"> </div>
					<div class="col-md-2">
						<a href="profile.php" class="button-profile" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-users"></i>My Profile</a>
					</div>
					<div class="col-md-2">
						<a href="pending.php" class="button-pending" style="text-decoration:none;" data-toggle="modal" ><i class="fa fa-spinner"></i> Pending Leaves</a>
					</div>
					<div class="col-md-2">
						<a href="approved.php" class="button-approve" style="text-decoration:none;" data-toggle="modal" ><i class="fa fa-check"></i> Approved</a>
					</div>
					<div class="col-md-2">
						<a href="view.php" class="button-total" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-th"></i> Total Leaves</a>
					</div>
					<div class="col-md"></div>
				</div>
			</div>
		</section>

		
		<!-- Menu section-->
		<section class="py-4 mb-4 bg-faded border shadow-sm p-3 rounded" style="margin-left: 190px; margin-right: 10px; height:500px; background-color:whitesmoke">
			<div class="container">
				<div class="row">

					<!-- Content Area -->
					<div class="row justify-content-between">
						<!-- Graph -->
						<div class="border rounded p-3 text-center" style="width:700px; height:450px; background-color:#d4f1f4;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;">
							<h2 class="info-box">Leave Application Statistic</h2>

							<div id="piechart_3d" style="margin-left:70px; width: 600px; height: 400px;"></div>
						</div>

						<!-- Display Total -->
						<div class="column">

							<!-- Total Staff -->
							<div class="col-sm-4 justify-content-between">
								<div class="border rounded p-3 text-center" style="height: 200px; width:400px; margin-left:20px; background-color:#d4f1f4;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;">
									<h2 class="info-box">Total Staff</h2>
									<span class="number-box">
									<?php
										$employee = $conn->query("SELECT userID 	
																  FROM `users` 
																  WHERE role='Staff' ")->num_rows;
										echo number_format($employee);
									?>
									</span>
								</div>
							</div>

							<!-- Total Leave Application  -->
							<div class="col-sm-4 justify-content-between">
								<div class="border rounded p-3 text-center" style="height:200px; width:400px; margin-left:20px; margin-top:40px; background-color:#d4f1f4; box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;">
									<h2 class="info-box">Total Application</h2>
									<span class="number-box">
									<?php
									
										$leaves = $conn->query("SELECT leaveID FROM `leaves` ")->num_rows;
										echo number_format($leaves);
									?>
									</span>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
</body>

</html>
