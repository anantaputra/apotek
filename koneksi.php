<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "apotek";
    $koneksi = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if(!$koneksi) {
        die("Failed to connect to the database: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
        return;
    }
