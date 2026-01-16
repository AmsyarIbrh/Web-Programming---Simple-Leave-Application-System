<?php
    // Start up your PHP Session. Need to have because we are bringing the session from 
    // one page to another.
    session_start();
    include('include/head.php');
?>

<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-toggleable-sm navbar-inverse p-0">
		<div class="container">
			<button class="navbar-toggler" data-target="#mynavbar" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a href="#" class="navbar-brand mr-3">Simple Online Leave Management</a>
			<div class="collapse navbar-collapse" id="mynavbar">
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown mr-3">
						
						<li class="nav-item">
							<a href="../logout.php" class="nav-link"><i class="fa fa-power-off"></i> Logout</a>
						</li>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--This Is Header-->
	<header id="main-header" class="bg-danger py-2 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><i class="fa fa-user-secret"></i> Approved Leaves Application </h1>
				</div>
			</div>
		</div>
	</header>
<!-- Approved List Table -->
<section id="post">
		<div class="container mt-5">
			<div class="row">
			<table class="table table-dark table-bordered table-hover table-striped">
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
									$sql = "SELECT * FROM leaves WHERE status = 1";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['name']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
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
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>
								
							 </tbody>
						</table>
			</div>
		</div>
	</section>

</body>

