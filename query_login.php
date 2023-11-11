<?php
    include 'koneksi.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        if(password_verify($password, $data['password'])) {
            header("location:dashboard/index.php");
        } else {
            header("location:index.php?message=failed");
        }
    }
