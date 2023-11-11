<?php
    include 'koneksi.php';

    $query = "SHOW TABLES LIKE 'admin'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE admin (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(20) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $result = mysqli_query($koneksi, $query);
        
        $password = password_hash("123", PASSWORD_DEFAULT);

        $query = "INSERT INTO admin VALUES('', 'admin', '$password', NULL)";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'suppliers'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE suppliers (
            id VARCHAR(10) PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            phone VARCHAR(255) NOT NULL UNIQUE,
            address TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL
        )";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'medicines'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE medicines (
            id VARCHAR(10) PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            price INT NOT NULL,
            stock INT NULL,
            type VARCHAR(255) NOT NULL,
            additionals TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL
        )";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'inventories'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE inventories (
            id VARCHAR(16) PRIMARY KEY,
            medicine_id VARCHAR(10),
            supplier_id VARCHAR(10),
            last_stock INT NULL,
            quantity INT NULL,
            additionals TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL,
            FOREIGN KEY (medicine_id) REFERENCES medicines(id),
            FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
        )";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'transactions'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE transactions (
            id VARCHAR(16) PRIMARY KEY,
            total INT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'transaction_details'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE transaction_details (
            id INT AUTO_INCREMENT PRIMARY KEY,
            transaction_id VARCHAR(16),
            medicine_id VARCHAR(10),
            quantity INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (transaction_id) REFERENCES transactions(id),
            FOREIGN KEY (medicine_id) REFERENCES medicines(id)
        )";
        $result = mysqli_query($koneksi, $query);
    }

    $query = "SHOW TABLES LIKE 'transactions_temp'";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) == 0) {
        $query = "CREATE TABLE transactions_temp (
            id INT AUTO_INCREMENT PRIMARY KEY,
            transaction_id VARCHAR(16),
            medicine_id VARCHAR(10),
            quantity INT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (medicine_id) REFERENCES medicines(id)
        )";
        $result = mysqli_query($koneksi, $query);
    }