<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Transaction Detail for <?= $_GET['id'] ?> Report</title>

    <link rel="shortcut icon" href="../../assets/icon.jpg" type="image/x-icon">

    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
</head>
<body>
    <div class="text-center border-bottom border-dark py-2 mb-4">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../../assets/icon.jpg" style="width: 80px;" alt="logo">
            <div class="ml-3">
                <h4>Apotek Application</h4>
                <h6>Transaction Detail for <?= $_GET['id'] ?> Report</h6>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 2%;">No.</th>
                <th class="text-center">Med ID - Medicine</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../../koneksi.php';
                $id = $_GET['id'];
                $query = "SELECT transaction_details.id, medicines.id AS medicine_id, 
                    medicines.name AS medicine, medicines.price AS medicine_price, transaction_details.quantity
                    FROM transaction_details JOIN medicines 
                    ON transaction_details.medicine_id = medicines.id 
                    WHERE transaction_details.transaction_id = '$id'";
                $result = mysqli_query($koneksi, $query);
                if(mysqli_num_rows($result) > 0) {
                    $no = 1;
                    $total = 0;
                    while($data = mysqli_fetch_array($result)) {
                        $total += $data['medicine_price'] * $data['quantity'];
            ?>
            <tr>
                <td><?= $no++ ?>.</td>
                <td><?= $data['medicine_id'] ?> - <?= $data['medicine'] ?></td>
                <td class="text-right">Rp <?= number_format($data['medicine_price'], 0, 0, '.') ?></td>
                <td class="text-center"><?= $data['quantity'] ?></td>
                <td class="text-right">Rp <?= number_format($data['medicine_price'] * $data['quantity'], 0, 0, '.') ?></td>
            </tr>
            <?php
                    }
            ?>
                <tr>
                    <td colspan="4" class="text-right">Total</td>
                    <td class="text-right">Rp <?= number_format($total, 0, 0, '.') ?></td>
                </tr>
            <?php
                } else {
            ?>
            <tr>
                <td colspan="5" class="text-center">No data available</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>