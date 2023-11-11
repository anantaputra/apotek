<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $medicine = $_POST['medicine'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $additionals = $_POST['additionals'];

    $query = "SELECT * FROM medicines WHERE id = '$medicine'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
    $stock = $data['stock'];

    $query = "INSERT INTO inventories SET 
        id = '$id', 
        medicine_id = '$medicine',
        supplier_id = '$supplier',
        last_stock = '$stock',
        quantity = '$quantity',
        additionals = '$additionals'
    ";

    $result = mysqli_query($koneksi, $query);

    $stock = $stock + $quantity;

    $query = "UPDATE medicines SET stock = '$stock' WHERE id = '$medicine'";
    $result = mysqli_query($koneksi, $query);

    header("location:index.php");