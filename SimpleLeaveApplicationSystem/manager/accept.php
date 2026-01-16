<?php
	include('include/config.php'); 
	if (isset($_POST['approve'])){
		$appid = $_POST['appid'];
		$sql = "UPDATE leaves 
				SET status='1' WHERE leaveID = '$appid'";
		$run = mysqli_query($conn,$sql);
		
        if($run == true)
        {	
			echo "<script> 
					alert('Application Approved');
					window.open('pending.php','_self');
				  </script>";
		}
		else
		{
			echo "<script> 
			alert('Failed To Approved');
			</script>";
		}
	}
	
 ?>