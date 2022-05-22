<?php
    include('../includes/db_connect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:../admin_signin.html');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- for chart -->
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.8.0/js/anychart-data-adapter.min.js"></script>

        <!--Css Stylesheets-->
        <link rel="stylesheet" href="../assets/css/nav.css">
        <link rel="stylesheet" href="../assets/css/admin.css">
        <link rel="stylesheet" href="../assets/css/tables.css">
      
        <!-- =====GOOGLE FONT===== -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
        <!--FontAwesome-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

       
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     

        <title>COVID-19 | Admin Dashboard</title>
         
    </head>
    <body id="body-pd" class="body-pd">
        <header class="header body-pd" id="header">
            <div class="header__toggle ">
                <i class='bx bx-menu bx-x' id="header-toggle"></i>
            </div>
             <div class="header_title mt-2 ml-5">
                <h5>COVID - 19</h5>
             </div>

            
             <div class="mt-3">
                <a href="../includes/logout.php?user=admin" class="nav__link  admin_nav_link text-danger">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Logout</span>
                </a>
            </div>
        </header>

        <div class="l-navbar showing" id="nav-bar">
            <nav class="nav" style="overflow-y:auto">
                <div>
                    <a class="nav__logo">
                        <span class="nav__logo-name">Admin</span>
                    </a>

                    <div id= "left-nav" class="nav__list admin_nav_list">
                        <a href="../admin/dashboard.php" class="nav__link admin_nav_link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <a href="../admin/users.php" class="nav__link admin_nav_link">
                        <i class='bx bxs-user-detail'></i>
                            <span class="nav__name">Users</span>
                        </a>

               
                        <a href="../admin/covid.php" class="nav__link admin_nav_link">
                            <i class='bx bxs-virus'></i>
                            <span class="nav__name">Covid Status</span>
                        </a>
                        
                    </div>
                </div>
            </nav>
        </div>
