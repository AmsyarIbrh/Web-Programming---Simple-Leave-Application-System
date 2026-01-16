<?php
	// Start the session
	session_start();
	include('include/config.php');
	include('include/head.php');
?>

<html>
<body blur>

	<!-- Header-->
	<header id="main-header" class="p-5 ml-15">
		<div class="container" style="margin-left:280px;">
			<div class="row">
				<div class="col-md-15">
					<h1 class="neonText"><i class="fa fa-user-secret"></i> Leave Application Management System </h1>
				</div>
			</div>
		</div>
	</header>

	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
							
			</div>
		</div>
	
	</section>
	<!----Section2 for showing username and password button ---->
	<section id="post">
		<div class="container">
			<div class="row">
				<div class=" col-md-6 offset-md-3">
					<div class="card shadow-lg">
						<div class="card-header bg-gradient bg-dark">
							<h5 align="center" class = "p-3 text-white ">Login Panel</h5>
						</div>
						<div class="card-body p-3">
							<form action="check_login.php" method="POST">
								<label class="form-control-label">Email</label>
								<input type="email" name="email" class="form-control" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];}?>" required/>
								<br />
								<label class="form-control-label">Password</label>
								<input type="password" name="password" class="form-control" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>" required/>
								<br />
								<div class="input-group left mb-3">
									<p><input type="checkbox" name="remember" /> Remember me </p>
									<?php "<div> </div>" ?>
								</div>
								<input type="submit" name="submit" style="border-radius:0%;" class="btn btn-success" value="Log In" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!----Section3 footer ---->
	<section id="main-footer" class="py-4 text-center text-white bg-inverse" style="margin-top:40px;">
		<div class="container">
			<div class="row">
				<div class="col">
				<p class="lead">&copy; <?php echo date("Y")?> Developed by Group 1</p>
				</div>
			</div>
		</div>
	</section>
	

</body>
</html>
