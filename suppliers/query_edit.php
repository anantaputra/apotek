<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "UPDATE suppliers SET 
        name = '$name',
        email = '$email',
        phone = '$phone',
        address = '$address'
        WHERE
        id = '$id'
    ";

    $result = mysqli_query($koneksi, $query);

    header("location:index.php");