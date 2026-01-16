<?php
    // Start up your PHP Session. Need to have because we are bringing the session from 
    // one page to another.
    session_start();
    include('include/head.php');

?>

<body>
		<!-- Sidebar -->
		<div class="side-navbar-approve active-nav d-flex justify-content-between flex-wrap flex-column" >
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
		<header id="margin-l" class="header py-2 text-white" style=" font-family: 'Didact Gothic'; background-color:#baffc9 ; margin-right:10px;">
			<div class="container">
				<div class="row ">
					<div class="col-md-10">
						<h1 style="color:black;"><i class="fa fa-user-secret"></i> Approved Leaves Application </h1>
					</div>
				</div>
			</div>
		</header>

		<!-- Button section -->
		<section id="sections" style="margin-left:700px; margin-bottom:20px; margin-top:50px; border">
			<form action="approved.php" method="POST">
				<div class="container">
					<div class="row">

						<input type="hidden" name="userChoice1" value="<?php echo $userChoice = 1; ?>">	<!-- Will set the userChoice = 1 after click-->
						<input type="submit" class="btn btn-sm btn-success shadow button-save" name="ascending" value="Sort in Oldest"> 	<!--Sort by ascending  This is what the user will see--> 
		
			
						<!-- After click, it will redirect to approved again, more like reload -->
						<input type="hidden" name="userChoice2" value="<?php echo $userChoice = 2; ?>">
						<input type="submit" class="btn btn-sm btn-danger button-cancel" style="margin-left:20px;" name="descending" value="Sort in Latest"> 	<!-- Sort by descending This is what the user will see-->
					</div>
				</div>
			</form>
		</section>

		<!-- Menu section-->
		<section class=" mb-4 bg-faded border shadow-sm rounded" style="padding:40px; margin-top: 20px; margin-left: 190px; margin-right: 10px; height:600px; background-color:whitesmoke">
			<div>
				<div class="row">
					<!-- Content Area -->
					<table class="table table-bordered table-hover table-striped table-design3">
						<thead thead-dark>
							<th>#</th>
							<th>Name</th>
							<th>Department</th>
							<th>Date</th>
							<th>Reason</th>
							<th>Status</th>
						</thead>
							<tbody>
	
							<?php
								$userChoice = ''; // default 
								if (isset($_POST['ascending'])){
									$sql = "SELECT * FROM leaves
											INNER JOIN department
											ON leaves.dID =  department.departmentID 
											WHERE status = 1 
											ORDER BY leavedate ASC";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
								}else
								if(isset($_POST['descending'])){
									$sql = "SELECT * FROM leaves
											INNER JOIN department
											ON leaves.dID =  department.departmentID  
											WHERE status = 1 
											ORDER BY leavedate DESC";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
								}
								else{
									$sql = "SELECT * FROM leaves
											INNER JOIN department
											ON leaves.dID =  department.departmentID 
										 	WHERE status = 1";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
								}
								while ($result = mysqli_fetch_assoc($que)) {
							?>

								<tr>
									<td><?php echo $cnt;?></td>
									<td><?php echo $result['name']; ?></td>
									<td><?php echo $result['dName']; ?></td>
									<td><?php echo $result['leavedate']; ?></td>
									<td><?php echo $result['leavereason']; ?></td>
									<td>
									<?php 
										if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
										}
										else{
											echo "<span class='badge badge-success'>Approved</span>";
										}
										$cnt++;}
									?>
									</td>
								</tr>
								
							</tbody>
					</table>
				</div>					
			</div>
		</section>
		
</body>

