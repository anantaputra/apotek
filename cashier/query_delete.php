<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $query = "DELETE FROM transactions_temp WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    header("location: index.php");
    