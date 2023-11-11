<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $medicine = $_POST['medicine'];
    $quantity = $_POST['quantity'];

    $query = "SELECT * FROM medicines WHERE id = '$medicine'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        $stock = $data['stock'];
        $med = $data['name'];

        if($quantity > $stock) {
            header("location: index.php?error");
            return;
        }
    }

    $query = "INSERT INTO transactions_temp SET 
        transaction_id = '$id',
        medicine_id = '$medicine',
        quantity = '$quantity'
    ";

    $result = mysqli_query($koneksi, $query);

    header("location: index.php");
    