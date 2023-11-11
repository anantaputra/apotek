<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM inventories WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
    $last_stock = $data['last_stock'];
    $medicine = $data['medicine_id'];

    $query = "UPDATE inventories SET 
        deleted_at = CURRENT_TIMESTAMP
        WHERE
        id = '$id'
    ";

    $result = mysqli_query($koneksi, $query);
    
    $query = "UPDATE medicines SET 
        stock = '$last_stock'
        WHERE
        id = '$id'
    ";
    
    $result = mysqli_query($koneksi, $query);

    header("location:index.php");