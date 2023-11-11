<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Inventories Report</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="print/inventories.php" target="_blank" class="btn icon icon-left btn-primary"><i data-feather="printer" width="20"></i> Print</a>
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
                            <th class="text-center">Medicine Name</th>
                            <th class="text-center">Supplier Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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
