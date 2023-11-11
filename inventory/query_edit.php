<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $medicine = $_POST['medicine'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $additionals = $_POST['additionals'];

    $query = "SELECT * FROM inventories WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
    $medicine_old = $data['medicine_id'];
    $last_stock = $data['last_stock'];
    if($medicine_old == $medicine) {
        if($data['quantity'] != $quantity) {
            $new_stock = $last_stock + $quantity;
            
            $query = "UPDATE medicines SET
                stock = '$new_stock'
                WHERE
                id = '$medicine'
            ";

            $result = mysqli_query($koneksi, $query);
        }
    } else {
        $query = "UPDATE medicines SET
            stock = '$last_stock'
            WHERE
            id = '$medicine_old'
        ";
    
        $result = mysqli_query($koneksi, $query);


        $query = "SELECT * FROM medicines WHERE id = '$medicine'";
        $result = mysqli_query($koneksi, $query);
        $med = mysqli_fetch_array($result);
        $stock = $med['stock'];
        $new_stock = $stock + $quantity;

        $query = "UPDATE medicines SET
            stock = '$new_stock'
            WHERE
            id = '$medicine'
        ";
    
        $result = mysqli_query($koneksi, $query);
    }

    $query = "UPDATE inventories SET
        medicine_id = '$medicine',
        supplier_id = '$supplier',
        last_stock = '$stock',
        quantity = '$quantity',
        additionals = '$additionals'
        WHERE
        id = '$id'
    ";

    $result = mysqli_query($koneksi, $query);

    header("location:index.php");