<?php
    include '../koneksi.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek</title>

    <link rel="shortcut icon" href="../assets/icon.jpg" type="image/x-icon">
    
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="../assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class=" text-center mt-2">
                    <img src="../assets/icon.jpg" height="80"></br>
                    <span>Apotek Application</span></br>
                    <hr>
                </div>
                <div class="sidebar-menu" style="margin-top:-25px">
                    <ul class="menu">
                        <li class='sidebar-title'>Menu</li>

                        <li class="sidebar-item <?= (strpos($_SERVER['REQUEST_URI'], 'dashboard')) ? 'active' : '' ?>">
                            <a href="../dashboard/index.php" class='sidebar-link'>
                                <i data-feather="home" width="20"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?= (strpos($_SERVER['REQUEST_URI'], 'inventory')) ? 'active' : '' ?>">
                            <a href="../inventory/index.php" class='sidebar-link'>
                                <i data-feather="truck" width="20"></i> 
                                <span>Inventories</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item <?= (strpos($_SERVER['REQUEST_URI'], 'reports')) ? 'active' : '' ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file" width="20"></i> 
                                <span>Reports</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="../reports/medicines.php">Medicines</a>
                                </li>
                                <li>
                                    <a href="../reports/inventories.php">Inventories</a>
                                </li>
                                <li>
                                    <a href="../reports/transactions.php">Transactions</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?= (strpos($_SERVER['REQUEST_URI'], 'data_master')) ? 'active' : '' ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="database" width="20"></i> 
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="../medicines/index.php">Medicines</a>
                                </li>
                                <li>
                                    <a href="../suppliers/index.php">Suppliers</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li>
                            <a href="../query_logout.php"><i data-feather="log-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
            