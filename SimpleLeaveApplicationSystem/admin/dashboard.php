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

				<li href="#" class="nav-link">
					<a href="adduser2.php" class="navbar-link"> Add New User</a>
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
					<a href="dashboard.php" class="navbar-brand ">Simple Leave Management System</a>
					<a href="../logout.php" class="navbar-brand ">Logout</a>
			</div>
		</nav>	

		<!--Header-->
		<header id="margin-l" class="header py-2 text-white" style="background-color: #bea9df; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-6">
						<h1><i class="fa fa-user-secret"></i> Admin Panel </h1>
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
						<a href="adduser2.php" class="button-profile" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-users"></i>Add User</a>
					</div>
					<div class="col-md-2">
						<a href="staffList.php" class="button-total" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-th"></i> Staff List</a>
					</div>
					<div class="col-md-2">
						<a href="view.php" class="button-approve" style="text-decoration:none;" data-toggle="modal"><i class="fa fa-th"></i> Application </a>
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

					<!-- Total Employee -->
					<div class="col-sm-4 d-flex justify-content-center">
						<div class="border rounded p-3 text-center shadow-sm square bg-white">
							<h2 class="info-box">Total Employee</h2>
							<span class="number-box">
							<?php
							
								$employee = $conn->query("SELECT userID FROM `users` ")->num_rows;
								echo number_format($employee);
							?>
							</span>
						</div>
					</div>

					<!-- Total Staff  -->
					<div class="col-sm-4 d-flex justify-content-center">
						<div class="border rounded p-3 text-center shadow-sm square bg-white">
							<h2 class="info-box">Total Staff</h2>
							<span class="number-box">
							<?php
							
								$staff = $conn->query("SELECT count(*) AS staffCount FROM `users` WHERE role='Staff'")->fetch_assoc()['staffCount'];
								echo number_format($staff);
							?>
							</span>
						</div>
					</div>

					<!-- Total Admin -->
					<div class="col-sm-4 d-flex justify-content-center">
						<div class="border rounded p-3 text-center shadow-sm square bg-white">
							<h2 class="info-box">Total Manager</h2>
							<span class="number-box">
							<?php
							
								$manager = $conn->query("SELECT count(*) AS managerCount FROM `users` WHERE role='Manager'")->fetch_assoc()['managerCount'];
								echo number_format($manager);
							?>
							</span>
						</div>
					</div>

				</div>
			</div>
		</section>
</body>

<?php 
	if (isset($_POST['adduser']))
	{
		$name = $_POST['name'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "INSERT INTO users(name,department,email,password)VALUES('$name','$department','$email','$password')";

		$run = mysqli_query($conn,$sql);

		if($run == true){
			
			echo "<script> 
					alert('User Added');
					window.open('dashboard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
	
 ?>

</body>
</html>
