<?php
	session_start();
	include('include/config.php');
?>
<?php

	if (isset($_POST['reject']))
	{
		$appid = $_POST['appid'];
		$sql = "UPDATE leaves 
				SET status='3' 
				WHERE leaveID = '$appid'";

		$run = mysqli_query($conn,$sql);
        if($run)
        {	
			echo "<script> 
					alert('Application Rejected');
					window.open('pending.php','_self');
				  </script>";
		}
		else
		{
			echo "<script> 
			alert('Failed To Reject');
			</script>";
		}
	}
	
 ?>