<!DOCTYPE html>
<html lang="en">

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

    <style>

        body
        {
            background-color: whitesmoke;
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
            background-color:#bea9df;
            transition: 0.5s;
        }
        .side-navbar-right
        {
            width: 180px;
            height: 100%;
            position: fixed;
            margin-right:300px;
            background-color:#A7C7E7;
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
            font-family: andale mono, monospace;
        }
        .number-box
        {

            color:blue;
            text-align: center;
            font-family: andale mono, monospace;
            font-size:80px;
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

        .form-row {
            margin-bottom: 10px;
        }

        .form-label {
            width: 120px;
            text-align: left;
        }

        /*add user punya*/
        .form-input-long
        {
            width: 400px;
            outline:none;
        }

        /*add user punya*/
        input.uppercase
        {
        text-transform: uppercase;
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group input[type="radio"] {
            margin-right: 10px;
        }

        .submit-button {
            width: 120px;
            text-align: left;
        }

        .form-container input[type="submit"] {
            width: 100%;
            margin-top:-5px;
            box-sizing: border-box;
        }

        
        .btn-danger {
            background-color:#fdaaaa; /* Change the background color to your desired color */
            color: black; /* Change the text color to ensure readability */
        }

        .btn-success {
            background-color:#90EE90; /* Change the background color to your desired color */
            color: black;
        }
    
        @media (min-width: 768px) {
        .button-pending {
            padding: 0 40px;
        }
        }

    </style>
    <?php include 'include/config.php'; ?>
</head>
