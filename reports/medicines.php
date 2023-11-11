<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Medicines Report</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="print/medicines.php" target="_blank" class="btn icon icon-left btn-primary"><i data-feather="printer" width="20"></i> Print</a>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 16%;">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
                            <td colspan="7" class="text-center">No data available</td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
