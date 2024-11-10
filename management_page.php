<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['mgmt'])){
   header('location:login_form.php');
}

?> 

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Status Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        h1{
          text-align: center;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40 !important;
            color: #fff;
            text-align: left; /* Center the text in navbar */
            position: relative; /* Ensure z-index works correctly */
            z-index: 1000; /* Ensure navbar is above sidebar */
        }
        .navbar-brand {
            font-size: 24px;
            padding: 15px;
            margin-right: 300px;
            width: 100%; /* Ensure the navbar brand spans the entire width */
        }
        .nav-sidebar {
            background-color: #343a40;
            color: #b8c7ce;
            overflow-y: auto;
            border-right: 1px solid #2c3b41;
            position: fixed;
            top: 56px; /* Height of navbar */
            bottom: 0;
            left: 0; /* Attach sidebar to left-hand side of screen */
            z-index: 999; /* Ensure sidebar appears below navbar */
            width: 300px; /* Set the width of the sidebar */
            padding-top: 10px; /* Adjust the top padding to remove gap */
            margin: 0; /* Remove default margin */
        }
        .nav-sidebar .nav-link {
            padding: 15px 20px;
            font-size: 18px;
            color: #b8c7ce;
            transition: all 0.3s ease;
        }
        .nav-sidebar .nav-link:hover {
            background-color: #2c3b41;
            color: #fff;
        }
        .nav-sidebar .nav-heading {
            font-size: 20px;
            color: #fff;
            padding: 15px 20px;
        }
        .nav-sidebar .nav-submenu {
            background-color: #2c3b41;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .nav-sidebar .nav-submenu .nav-link {
            padding: 10px 20px;
            font-size: 16px;
            color: #b8c7ce;
            transition: all 0.3s ease;
        }
        .nav-sidebar .nav-submenu .nav-link:hover {
            background-color: #1e272e;
            color: #fff;
        }

        .btn-logout {
            background-color: #597694;
            border-color: #597694;
            border-radius: 5px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-logout:hover {
            background-color: #597694;
            border-color: #bd2130;
        }


        .main-content {
            padding: 20px;
            margin-left: 300px; /* Same as sidebar width */
            margin-top: 56px; /* Height of navbar */
            z-index: 1; /* Ensure main content is above sidebar */
        }
    </style>
</head>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Training Status Management System</span>
    </nav>
    <nav class="col-md-3 col-lg-2 d-md-block bg-sidebar sidebar">
        <div class="position-sticky">
            <ul class="nav flex-column nav-sidebar">
            <li class="nav-item">
                    <span class="nav-heading"></span>
                    <ul class="nav flex-column nav-submenu">
                        
                    </ul>
                </li>
                <li class="nav-item">

                    <span class="nav-heading">Setup</span>
                    <ul class="nav flex-column nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="program.php"><i class="fas fa-tachometer-alt me-2"></i>Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="batch.php"><i class="fas fa-users me-2"></i>Batch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="class.php"><i class="fas fa-chalkboard-teacher me-2"></i>Class</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student.php"><i class="fas fa-user-graduate me-2"></i>Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="trainer.php"><i class="fas fa-user-tie me-2"></i>Trainer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="platform.php"><i class="fas fa-laptop me-2"></i>Platform</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span class="nav-heading">Training</span>
                    <ul class="nav flex-column nav-submenu">
                        <li class="nav-item">
                            <a class="nav-link" href="trainingtopic.php"><i class="fas fa-plus-circle me-2"></i>Training Topic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="traininglist.php"><i class="fas fa-list me-2"></i>Training List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inserttraining.php"><i class="fas fa-plus-circle me-2"></i>Add Training</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-auto">
                    <a href="login_form.php" class="btn btn-lg btn-logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div>

    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
        <!-- Page Content Goes Here -->
        <h1><b>Welcome!! to Training Status Management System</b></h1>
        <!--<p>This is the dashboard of your system. You can manage your training programs, batches, classes, students, trainers, and platforms from here.</p>-->
        <img height="650px" width="1200px" src="training.png"/>
    </main>
    </div>
</body>
</html>