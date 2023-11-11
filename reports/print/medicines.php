<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Medicines Report</title>

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
                <h6>Medicines Report</h6>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 20%;">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../../koneksi.php';
                $query = "SELECT * FROM medicines WHERE deleted_at IS NULL";
                $result = mysqli_query($koneksi, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['name'] ?></td>
                <td class="text-center"><?= $data['stock'] ?></td>
                <td class="text-right">Rp <?= number_format($data['price'], 0, 0, '.') ?></td>
            </tr>
            <?php
                    }
                } else {
            ?>
            <tr>
                <td colspan="4" class="text-center">No data available</td>
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