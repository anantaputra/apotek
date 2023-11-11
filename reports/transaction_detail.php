<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Transaction Detail for <?= $_GET['id'] ?></h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="print/transaction_detail.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn icon icon-left btn-primary"><i data-feather="printer" width="20"></i> Print</a>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
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
                            <td colspan="4" class="text-center">No data available</td>
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
