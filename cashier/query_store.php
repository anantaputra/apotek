<?php
    include '../koneksi.php';

    $id = $_POST['id'];

    $query = "SELECT medicines.id AS medicine_id, medicines.price AS medicine_price, transactions_temp.quantity
        FROM transactions_temp JOIN medicines ON transactions_temp.medicine_id = medicines.id 
        WHERE transaction_id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
        $total = 0;

        mysqli_query($koneksi, "INSERT INTO transactions SET id = '$id'");

        while($data = mysqli_fetch_array($result)) {
            $total += $data['medicine_price'] * $data['quantity'];
            $medicine = $data['medicine_id'];
            $quantity = $data['quantity'];

            $query_detail = "INSERT INTO transaction_details SET 
                transaction_id = '$id',
                medicine_id = '$medicine',
                quantity = '$quantity'
            ";
        
            mysqli_query($koneksi, $query_detail);

            $query_med = "SELECT stock FROM medicines WHERE id = '$medicine'";
            $result_med = mysqli_query($koneksi, $query_med);
            $data_med = mysqli_fetch_array($result_med);
            $stock = $data_med['stock'];
            $stock = $stock - $quantity;

            $query_stock = "UPDATE medicines SET stock = '$stock' WHERE id = '$medicine'";
            mysqli_query($koneksi, $query_stock);
        }

        mysqli_query($koneksi, "UPDATE transactions SET total = '$total' WHERE id = '$id'");

        mysqli_query($koneksi, "DELETE FROM transactions_temp WHERE transaction_id = '$id'");
    }
    


    header("location: index.php");
    