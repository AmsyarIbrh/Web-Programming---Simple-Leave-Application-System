<!DOCTYPE html>
<html lang="en">

<?php
    include('config.php');
?>

<head>
    <!-- meta tag defines the metadata about an HTML document-->
    <meta charset="UTF-8">

    <!--Viewport meta allows optimization of code in mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    

    <title>Leave Application Management</title>

    <!-- Graph Function -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // PHP code to generate data array
        <?php
        $approve = $conn->query("SELECT leaveID FROM `leaves` WHERE status = '1'")->num_rows;
        $pending = $conn->query("SELECT leaveID FROM `leaves` WHERE status = '0'")->num_rows;
        $reject = $conn->query("SELECT leaveID FROM `leaves` WHERE status = '3'")->num_rows;

        $data = [];
        $data[] = ['Task', 'Count'];
        $data[] = ['Approve', $approve];
        $data[] = ['Pending', $pending];
        $data[] = ['Reject', $reject];
        ?>

        // Convert PHP data array to JavaScript
        var jsData = <?php echo json_encode($data); ?>;

        // Create the data table
        var data = google.visualization.arrayToDataTable(jsData);

        // Set chart options
        var options = {
        title: '',
        is3D: true,
        backgroundColor: 'transparent'
        };

        // Create and draw the chart
        var chartContainer = document.getElementById('piechart_3d');
        var chart = new google.visualization.PieChart(chartContainer);
        chart.draw(data, options);

        // Add CSS to center the chart
        chartContainer.style.display = 'flex';
        chartContainer.style.justifyContent = 'center';
    }
    </script>



    <style>

        body
        {
            background-color: whitesmoke;
        }
        shadow-box
        {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, 
                        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, 
                        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        
        .profile
        {
            font-family: 'Didact Gothic';
            font-size: 20px;
            color:#4169e1
        }
        .left-profile
        {
            margin-top:20px;
            margin-left:60px;
        }
        .right-profile
        {
            margin-top:20px;
            margin-left:70px;
        }
        /* Section for Counts*/
        .square
        {
            width:300px;
            height:300px
        }


        /* Left Sidebar */
        .sidebar-width
        {
            width:300px;
            float:left;
        }
        .side-navbar 
        {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-left:-300px;
            background-color:#A7C7E7;
            transition: 0.5s;
        }
        .side-navbar-pending
        {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-left:-300px;
            background-color: #fadca8;
            transition: 0.5s;
        }
        .side-navbar-approve
        {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-left:-300px;
            background-color: #baffc9;
            transition: 0.5s;
        }
        .nav-link:active,
        .nav-link:focus,
        .nav-link:hover 
        {
            background-color: #ffffff26;
        }
        .my-container
        {
            transition: 0.4s;
        }
            
        .active-nav 
        {
            margin-left: 0;
        }
        /* for main section */
        .active-cont 
        {
            margin-left: 180px;
        }
        #menu-btn 
        {
            background-color: #100901;
            color: #fff;
            margin-left: -62px;
        }
        #margin-l
        {
            margin-left:190px
        }
        .info-box
        {
            text-align: center;
            font-family: 'Didact Gothic'
        }
        .number-box
        {

            color:blue;
            text-align: center;
            font-family: andale mono, monospace;
            font-size:80px;
        }
        .table-design1
        {
            background-color:#DAF0F7;
        }
        .table-design2
        {
            background-color:#fdfdd2;
        }
        .table-design3
        {
            background-color:#e0f0e3;
        }
        /* Button Cancel*/
        .button-cancel {
        align-items: center;
        background-color:#FAA0A0;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-cancel:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-cancel:hover:after {
        transform: translate(0, 0);
        }

        .button-cancel:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-cancel:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-cancel {
            padding: 0 40px;
        }
        }
        /* Button Save*/
        .button-save {
        align-items: center;
        background-color:#77DD77;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-save:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-save:hover:after {
        transform: translate(0, 0);
        }

        .button-save:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-save:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-save {
            padding: 0 40px;
        }
        }
        /* Button Update*/
        .button-update {
        align-items: center;
        background-color:#FFDFD3;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-update:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-update:hover:after {
        transform: translate(0, 0);
        }

        .button-update:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-update:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-update {
            padding: 0 40px;
        }
        }
        /* Button Profile */
        .button-profile {
        align-items: center;
        background-color:#FFDFD3;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-profile:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-profile:hover:after {
        transform: translate(0, 0);
        }

        .button-profile:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-profile:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-profile {
            padding: 0 40px;
        }
        }
      
        /* Button Pending */
        .button-pending {
        align-items: center;
        background-color:#ffffba;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-pending:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-pending:hover:after {
        transform: translate(0, 0);
        }

        .button-pending:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-pending:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-pending {
            padding: 0 40px;
        }
        }

        /* Apprved List Button */
        .button-approve {
        align-items: center;
        background-color:#baffc9;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-approve:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-approve:hover:after {
        transform: translate(0, 0);
        }

        .button-approve:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-approve:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-approve {
            padding: 0 40px;
        }
        }

        /* Apprved List Button */
        .button-total {
        align-items: center;
        background-color:#98bad5;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-total:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-total:hover:after {
        transform: translate(0, 0);
        }

        .button-total:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-total:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-total {
            padding: 0 40px;
        }
        }

        /* Button  */
        .button-pending {
        align-items: center;
        background-color:#ffffba;
        border: 2px solid #111;
        border-radius: 8px;
        box-sizing: border-box;
        color: #111;
        cursor: pointer;
        display: flex;
        font-family: Inter,sans-serif;
        font-size: 16px;
        height: 48px;
        justify-content: center;
        line-height: 24px;
        max-width: 100%;
        padding: 0 25px;
        position: relative;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-pending:after {
        background-color: #111;
        border-radius: 8px;
        content: "";
        display: block;
        height: 48px;
        left: 0;
        width: 100%;
        position: absolute;
        top: -2px;
        transform: translate(8px, 8px);
        transition: transform .2s ease-out;
        z-index: -1;
        }

        .button-pending:hover:after {
        transform: translate(0, 0);
        }

        .button-pending:active {
        background-color: #ffdeda;
        outline: 0;
        }

        .button-pending:hover {
        outline: 0;
        }

        @media (min-width: 768px) {
        .button-pending {
            padding: 0 40px;
        }
        }

    </style>

</head>
<?php include 'include/config.php'; ?>