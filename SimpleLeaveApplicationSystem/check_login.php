<?php
	// Start up your PHP Session. Before the <html>
	include('include/config.php');
?>

<?php 

		//Getting the password and email that has been entered by the user on login page
		$email = $_POST['email'];
		$password = $_POST['password'];

		//Set the cookie
		if(!empty($_POST["remember"])) 
		{
			setcookie ("email",$_POST["email"],time()+(3600), "/", "");
			setcookie ("password",$_POST["password"],time()+(3600), "/", "");
			$emailCookie = $_POST["email"];
			$passwordCookie = $_POST["password"];
		} 
		else
		{
			setcookie ("email","",time()+(3600), "/", "");
			setcookie ("password","",time()+(3600), "/", "");
			$emailCookie = $_POST["email"];
			$passwordCookie = $_POST["password"];
		}

        // Getting the queries from the database
		$sql = "SELECT * 
				FROM users 
                WHERE email = '$email' AND password = '$password'";
        
		$sql2 = "SELECT *
				FROM admin
				WHERE email = '$email' AND password = '$password'";
        /*
			"$conn" refers to the variable that holds the connection to the MySQL database. It represents an established connection using the mysqli_connect function or the object-oriented approach to connect to the database.
			"$sql" is a string variable that contains the SQL query you want to execute.
			"mysqli_query" is a function used to send an SQL query to the database. It takes two parameters: the database connection variable and the SQL query.
			The function returns a result object, which is stored in the "$result" variable. This result object can be used to fetch the rows returned by the query or to check for errors.
			Overall, this line of code executes the SQL query stored in the "$sql" variable using the database connection represented by "$conn" and assigns the result to the "$result" variable for further processing or error handling.
		*/ 

		$result2 = mysqli_query($conn,$sql2);

		$result = mysqli_query($conn,$sql);

        //mysqli_num_rows($result) will check whether the is a row in the database that matches with the $result query
		if (mysqli_num_rows($result) > 0) 
		{
			// assign data of each row
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$id = $row["userID"];
				$password = $row["password"];
				$email = $row["email"];
				$role = $row['role'];
				$name = $row['name'];
			}
		}
		if(mysqli_num_rows($result2) > 0)
		{
			// assign data of each row
			while ($row = mysqli_fetch_assoc($result2)) 
			{
				$id = $row["id"];
				$password = $row["password"];
				$email = $row["email"];
			}
		}

		// mysql_num_row is counting table row
		// Count how many rows
		$count = mysqli_num_rows($result);
		$count2 = mysqli_num_rows($result2);

		// If result matched $myusername and $mypassword, table row must be 1 row
		if ($count == 1) 
		{
			session_start();

			$_SESSION["Login"] = "YES";

			// Add user information to the session (global session variables)
			$_SESSION['id'] = $id;
			$_SESSION['password'] = $password;
			$_SESSION['email'] = $email;
			$_SESSION['role'] = $role;
			$_SESSION['name'] = $name;

			if($_SESSION['role'] == 'Manager')
			{
				echo  "<script> window.open('manager/dashboard.php','_self') </script>";
			}
			else
			if($_SESSION['role'] == 'Staff')
			{
				echo  "<script> window.open('staff/dashboard.php','_self') </script>";
			}
		}
		else
		if ($count2 == 1)
		{
			session_start();

			$_SESSION["Login"] = "YES";

			// Add user information to the session (global session variables)
			$_SESSION['id'] = $id;
			$_SESSION['password'] = $password;
			$_SESSION['email'] = $email;

			echo  "<script> window.open('admin/dashboard.php','_self') </script>";
			
		}
		//if wrong username and password. It will set the user session to NO
		else 
		{
			session_start();
			$_SESSION["Login"] = "NO";

			echo
			 
            "<script> 
			    alert('Email or Password Invalid');
			    window.open('index.php','_self');
			</script>";
		}

		?>
