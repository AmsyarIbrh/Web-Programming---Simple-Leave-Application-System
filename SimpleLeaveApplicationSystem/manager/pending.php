<?php
    // Start up your PHP Session. Need to have because we are bringing the session from 
    // one page to another.
    session_start();
    include('include/head.php');

	// Get the session ID of the user
	$id = $_SESSION['id']
?>
<body>
		<!-- Sidebar -->
		<div class="side-navbar-pending active-nav d-flex justify-content-between flex-wrap flex-column" >
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
		<header id="margin-l" class="header py-2 text-white" style="font-family: 'Didact Gothic'; background-color: #fadca8; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-5">
						<h1 style="color:black;"><i class="fa fa-user-secret"></i> Pending Application </h1>
					</div>
				</div>
			</div>
		</header>
        		
		<!-- Menu section-->
		<section class=" mb-4 bg-faded border shadow-sm rounded" style="padding:40px; margin-top: 20px; margin-left: 190px; margin-right: 10px; height:600px; background-color:whitesmoke">
			<div>
				<div class="row">
					<!-- Content Area -->
					<table class="table table-dark table-bordered table-hover table-striped"></table>
						<div class="modal-body">
						<table class="table table-dark table-bordered table-hover table-striped table-design2">
						<thead style="color:black;" align="center">
							<th>#</th>
							<th>Name</th>
							<th>Department</th>
							<th>Date</th>
							<th>Reason</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
							<tbody>
							
							<?php 
					
								$sql = "SELECT * FROM leaves 
										INNER JOIN department
										ON leaves.dID = department.departmentID 
										WHERE status = 0";

								$que = mysqli_query($conn,$sql);
								$cnt = 1;

								while ($result = mysqli_fetch_assoc($que)) {
							?>

								
							<tr style="color:black;">
								<td><?php echo $cnt;?></td>
								<td><?php echo $result['name']; ?></td>
								<td><?php echo $result['dName']; ?></td>
								<td><?php echo $result['leavedate']; ?></td>
								<td><?php echo $result['leavereason']; ?></td>
								<td align="center">
									<?php 
									if ($result['status'] == 0) {
										echo "<span class='badge badge-warning' style='width:90px; height:30px;'  >Pending</span>";
										?>
										</td>
								<td align="center">
									<form action="accept.php?id=<?php echo $result['leaveID']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['leaveID']; ?>">
										<input type="submit" class="btn btn-sm btn-success shadow " name="approve" value="Approve">
									</form>

                                    <form action="delete.php?id=<?php echo $result['leaveID']; ?>" method="POST">
										<input type="hidden" name="appid" value="<?php echo $result['leaveID']; ?>">
										<input type="submit" class="btn btn-sm btn-danger shadow" style="margin-top:10px; width:70px;" name="reject" value="Reject">
									</form>
								</td>
										<?php
									}
									else{
										echo "Approved";
									}
							$cnt++;	}
									?>
								
							</tr>

							</tbody>
					</table>
				</div>					
			</div>
		</section>
</body>