<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Transactions Report</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="print/transactions.php" target="_blank" class="btn icon icon-left btn-primary"><i data-feather="printer" width="20"></i> Print</a>
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
                            <th class="text-center">Date</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"><i data-feather="more-horizontal" width="20"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM transactions";
                            $result = mysqli_query($koneksi, $query);
                            if(mysqli_num_rows($result) > 0) {
                                $total = 0;
                                while($data = mysqli_fetch_array($result)) {
                                    $total = $data['total'];
                        ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= date("d M Y", strtotime($data['created_at'])) ?></td>
                            <td class="text-right">Rp <?= number_format($data['total'], 0, 0, '.') ?></td>
                            <td class="text-center">
                                <a href="transaction_detail.php?id=<?= $data['id'] ?>" class="text-primary"><i data-feather="eye" width="20"></i></i></a>
                            </td>
                        </tr>
                        <?php
                                }
                        ?>
                        <tr>
                            <td colspan="2" class="text-right">Total</td>
                            <td class="text-right">Rp <?= number_format($total, 0, 0, '.') ?></td>
                            <td></td>
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
