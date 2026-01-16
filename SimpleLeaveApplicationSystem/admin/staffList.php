<?php
    // Start up your PHP Session. Need to have because we are bringing the session from 
    // one page to another.
    session_start();
    include('include/head.php');
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
					<a href="dashboard.php" class="navbar-brand ">Logout</a>
			</div>
	</nav>	

	<!--Header-->
	<header id="margin-l" class="header py-2 text-white" style="background-color: #bea9df; margin-right:10px;">
		<div class="container">
			<div class="row ">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> Staff List </h1>
				</div>
			</div>
		</div>
	</header>

		<!-- Menu section-->
		<section class=" mb-4 bg-faded border shadow-sm rounded" style="padding:40px; margin-top: 20px; margin-left: 190px; margin-right: 10px; height:600px; background-color:whitesmoke">
			<div>
				<div class="row">
					<!-- Content Area -->
					<table class="table  table-bordered table-hover table-striped">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Department</th>
							<th>Email</th>
							<th>Password</th>
							<th>Position</th>
							<th>Action</th>
							
						</thead>
							<tbody>
							<?php 
								$sql = "SELECT * 
										FROM users
										INNER JOIN department
										ON users.dID = department.departmentID";
								$que = mysqli_query($conn,$sql);
								$cnt = 1;
								while ($result = mysqli_fetch_assoc($que)) {
								?>

								
							<tr>
								<td><?php echo $cnt;?></td>
								<td><?php echo $result['name']; ?></td>
								<td><?php echo $result['dName']; ?></td>
								<td><?php echo $result['email']; ?></td>
								<td><?php echo $result['password']; ?></td>
								<td><?php echo $result['role']; ?></td>
								<td>
									<div class="form-container">
									<form action="edit.php?id=<?php echo $result['userID']; ?>" method="POST">
										<input type="hidden" name="id" value="<?php echo $result['userID']; ?>">
										<input text-align=center type="submit" class="btn btn-sm btn-success shadow" name="edit" value="Edit">
									</form>

                                    <form action="delete.php?id=<?php echo $result['userID']; ?>" method="POST">
										<input type="hidden" name="id" value="<?php echo $result['userID']; ?>">
										<input type="submit" class="btn btn-sm btn-danger px-3 mt-4" name="delete" value="Delete">
									</form>
									</div>
								</td>
								    <?php
									
							$cnt++;	}
									?>
								
							</tr>

							</tbody>
					</table>
				</div>					
			</div>
		</section>
    

</body>