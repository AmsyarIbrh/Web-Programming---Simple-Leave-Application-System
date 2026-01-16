<?php
// Start up your PHP Session. Need to have because we are bringing the session from 
// one page to another.
session_start();
include('include/head.php');

// Get the session ID of the user
$id = $_SESSION['id']
	?>

<body>
	<?php
	$sql3 = "SELECT * FROM users 
					 INNER JOIN department
					 ON users.dID = department.departmentID
					 WHERE userID ='" . $id . "'";

	mysqli_select_db($conn, "simpleleavedb");
	$result3 = mysqli_query($conn, $sql3);

	// $row3 consist all of the information based on the session id
	$row3 = mysqli_fetch_assoc($result3);
	?>


	<!-- Sidebar -->
	<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column">
		<ul class="nav flex-column text-white w-100">
			<a href="#" class="nav-link h3 text-white my-2"></a>

			<img src="img/logo-utm.png" alt="logo-utm" width="160px" height="50px"
				style="margin-left:8px; margin-bottom:30px; margin-top:30px;">

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
			<button class="navbar-toggler" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="dashboard.php" class="navbar-brand ">Simple Online Leave Management</a>
			<a href="dashboard.php" class="navbar-brand ">Logout</a>
		</div>
	</nav>

	<!--Header-->
	<header id="margin-l" class="header py-2 text-white"
		style="font-family: 'Didact Gothic'; background-color: #A7C7E7; margin-right:10px;">
		<div class="container">
			<div class="row ">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> My Profile</h1>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu section-->
	<section class=" mb-4 bg-faded border shadow-sm rounded"
		style="margin-top: 20px; margin-left: 190px; margin-right: 10px; height:600px; background-color:whitesmoke">
		<div>
			<form action="update.php" method="post" class="form-group">
				<div class="row flex-nowrap">
					<!-- Content Area -->
					<!-- Left Side Container -->
					<div class="left-profile">
						<!-- Name -->
						<h4 class="profile">Personal Information</h4>
						<br>

						<div class="row">
							<h4 class="profile"> Name </h4>
							<input type="text" name="name" value="<?php echo $row3['name'] . " "; ?>"
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:148px; width:400px; text-transform:uppercase;">
							</input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Email </h4>
							<input type="text" name="email" value="<?php echo $row3['email'] . " "; ?> "
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:148px; width:400px;"> </input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Password </h4>
							<input type="password" name="password" value="<?php echo $row3['password'] . " "; ?>"
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:120px; width:400px;"></input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Telephone Number </h4>
							<input type="text" name="telno" value="<?php echo $row3['telNo'] . " "; ?>"
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:40px; width:400px;"> </input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Date of Birth </h4>
							<input type="text" name="dob" value="<?php echo $row3['dateofBirth'] . " "; ?>"
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:88px; width:400px;"></input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Street </h4>
							<input type="text" name="street" value="<?php echo $row3['street'] . " "; ?> "
								class="border border-black rounded p-1"
								style="background-color:#d4f1f4; margin-left:148px; width:400px; text-transform:uppercase;">
							</input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Postcode </h4>
							<input type="text" name="postcode" value="<?php echo $row3['postcode'] . " "; ?>"
								class="border border-black rounded p-1"
								style=" background-color:#d4f1f4; margin-left:118px; width:400px;"> </input>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> State </h4>
							<input type="text" name="state" value="<?php echo $row3['state'] . " "; ?>"
								class="border border-black rounded p-1"
								style=" background-color:#d4f1f4; margin-left:148px; width:400px; text-transform:uppercase;">
							</input>
						</div>
						<br>
					</div>

					<!-- Right Side Container -->
					<div class="right-profile">
						<!-- Name -->
						<h4 class="profile">Department Information</h4>
						<br>

						<div class="row">
							<h4 class="profile"> Department </h4>
							<div class="border border-black rounded p-1" name="dName"
								style=" background-color:#d4f1f4; margin-left:92px; width:400px; text-transform:uppercase;">
								<?php echo $row3['dName'] . " "; ?>
							</div>
						</div>
						<br>
						<div class="row">
							<h4 class="profile"> Position </h4>
							<div class="border border-black rounded p-1" name="role"
								style="background-color:#d4f1f4; margin-left:120px; width:400px; text-transform:uppercase;">
								<?php echo $row3['role'] . " "; ?>
							</div>
						</div>
						<br>
						<div class="row">
							<button type="submit" class="button-save" style="text-decoration:none;"
								data-toggle="modal"><i class="fa fa-spinner"></i> Save Information </button>
							<a href="profile.php" class="button-cancel"
								style="text-decoration:none; margin-left:20px; width:200px;" data-toggle="modal"><i
									class="fa fa-spinner"></i> Cancel </a>
						</div>

					</div>
				</div>
			</form>
		</div>
	</section>
</body>