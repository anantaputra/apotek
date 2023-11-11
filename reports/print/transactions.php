<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Transactions Report</title>

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
                <h6>Transactions Report</h6>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 20%;">ID</th>
                <th class="text-center">Date</th>
                <th class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../../koneksi.php';
                $query = "SELECT * FROM transactions";
                $result = mysqli_query($koneksi, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= date("d M Y", strtotime($data['created_at'])) ?></td>
                <td class="text-right">Rp <?= number_format($data['total'], 0, 0, '.') ?></td>
            </tr>
            <?php
                    }
                } else {
            ?>
            <tr>
                <td colspan="3" class="text-center">No data available</td>
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