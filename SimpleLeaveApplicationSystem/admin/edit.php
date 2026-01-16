<?php

include('include/config.php');
include('include/head.php');

$id = $_POST["id"];


$sql = "SELECT * 
        FROM users 
        INNER JOIN department
        ON users.dID = department.departmentID
        WHERE users.userID = '$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        //Q4: get all the fieldnames from the selected row
        $name = $row["name"];
        $department = $row["dName"];
        $email = $row["email"];
        $password = $row["password"];
        $position = $row["role"];


    }
}

?>


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
                    <h1><i class="fa fa-user-secret"></i> Edit Panel </h1>
                </div>
            </div>
        </div>
    </header>





    <!--BUAT DIV ATAU CONTAINER SUPAYA DIA KETENGAH KAT CENTER 
        BUAT STYLE KAT HEAD.PHP
    -->
    <div id="margin-l">
        <div class="container mt-5">
            <form method="POST" action="update.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- hidden element -->
                <div class="row mb-3"> <!-- set the grid elements -->
                    <label class="col-sm-3 col-form-label">Name :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="department"
                        style="width: 120px; text-align: left;">Department:</label>
                        <div class="row mb-3">
                <div class="col-sm-6" class="form-control">
                    <select id="department" name="department" required class="form-control">
                    <option value="">Select department</option>
                    <?php
                    $sql = "SELECT departmentID, dName FROM department";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $departmentID = $row['departmentID'];
                        $departmentName = $row['dName'];
                        echo "<option value='$departmentID'>$departmentName</option>";
                     }
            ?>
        </select><br>
    </div>
</div>

                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Password :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Position :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="position" value="<?php echo $position; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

<?php
//