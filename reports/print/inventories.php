<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Inventories Report</title>

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
                <h6>Inventories Report</h6>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center" style="width: 20%;">ID</th>
                <th class="text-center">Medicine Name</th>
                <th class="text-center">Supplier Name</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../../koneksi.php';
                $query = "SELECT inventories.id, medicines.name AS medicine, 
                suppliers.name AS supplier, inventories.quantity, inventories.created_at 
                FROM inventories JOIN medicines 
                ON inventories.medicine_id = medicines.id
                JOIN suppliers
                ON inventories.supplier_id = suppliers.id 
                WHERE inventories.deleted_at IS NULL";
                $result = mysqli_query($koneksi, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['medicine'] ?></td>
                <td><?= $data['supplier'] ?></td>
                <td class="text-center"><?= $data['quantity'] ?></td>
                <td class="text-center"><?= date('d M Y', strtotime($data['created_at'])) ?></td>
            </tr>
            <?php
                    }
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