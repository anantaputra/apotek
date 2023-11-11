<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $additionals = $_POST['additionals'];

    $query = "INSERT INTO medicines SET 
        id = '$id', 
        name = '$name',
        type = '$type',
        price = '$price',
        stock = '$stock',
        additionals = '$additionals'
    ";

    $result = mysqli_query($koneksi, $query);

    header("location:index.php");