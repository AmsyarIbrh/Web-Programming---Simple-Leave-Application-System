<?php
    // Start the session and include necessary files
    session_start();
    include('include/head.php');
    // Get the session ID of the user
    $id = $_SESSION['id'];

    // Fetch the user's information from the database based on the ID
    $sql = "SELECT * FROM users WHERE userID = '".$id."'";
    mysqli_select_db($conn, "simpleleavedb");

    $result = mysqli_query($conn, $sql);

    $row3 = mysqli_fetch_assoc($result);

    // Check if the user information is fetched successfully
    if (!$row3) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Leave History</title>
	
	<style>
		.report-form {
			background-color: #F8F8F8;
			border-radius: 5px;
			padding: 20px;
			margin-bottom: 30px;
		}

		.report-form h2 {
            font-size: 20px;
			margin-bottom: 20px;
		}

		.report-form table {
			width: 100%;
            background-color: #f6dbdb;
            border-collapse: collapse;
		}

		.report-form table thead th {
			background-color: #343A40;
			color: #FFFFFF;
			padding: 10px;
			text-align: center;
            border: 1px solid #343A40;
		}

		.report-form table tbody td {
			padding: 10px;
			text-align: center;
            border: 1px solid #343A40;
		}

		.report-form .badge {
			padding: 5px 10px;
            border-radius: 5px;
		}

		.cancel-button {
			display: inline-block;
			padding: 5px 10px;
			background-color: #DC3545;
			color: #FFFFFF;
			border-radius: 5px;
			text-decoration: none;
		}
	</style>
</head>
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

		<!-- Leave History Report Form -->
		<section class="mb-2 bg-faded border shadow-sm rounded" style="margin-top:10px; margin-left: 190px; margin-right: 10px; height:540px; background-color:whitesmoke">
			<div class="container" style="margin-left:50px;">
				<div class="row justify-content-between report-form">
					<!-- Content Area -->
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Department</th>
								<th>Date</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Fetch the leave history based on the user's email
							$leaveHistorySQL = "SELECT * 
												FROM leaves
												INNER JOIN department
												ON leaves.dID = department.departmentID 
												WHERE email = '".$row3['email']."'";

							mysqli_select_db($conn, "simpleleavedb");
							$leaveHistoryResult = mysqli_query($conn, $leaveHistorySQL);
							$cnt = 1;

							// Loop through the leave history records
							while ($leave = mysqli_fetch_assoc($leaveHistoryResult)) {
								echo "<tr>";
								echo "<td>".$cnt."</td>";
								echo "<td>".$leave['name']."</td>";
								echo "<td>".$leave['dName']."</td>";
								echo "<td>".$leave['leavedate']."</td>";
								echo "<td>".$leave['leavereason']."</td>";
								echo "<td>";
								if ($leave['status'] == 0) {
									echo "<span class='badge badge-warning'>Pending</span>";
								} else {
									echo "<span class='badge badge-success'>Approved</span>";
								}
								echo "</td>";
								echo "<td>";
								if ($leave['status'] == 0) 
								{
									echo "<a href='cancel_leave.php?id=".$leave['leaveID']."' class='cancel-button'>Cancel</a>";
								}
								echo "</td>";
								echo "</tr>";
								$cnt++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
</body>
</html>
