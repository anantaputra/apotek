<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $query = "UPDATE medicines SET 
        deleted_at = CURRENT_TIMESTAMP
        WHERE
        id = '$id'
    ";

    $result = mysqli_query($koneksi, $query);

    header("location:index.php");