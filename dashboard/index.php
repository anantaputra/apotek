<?php include '../layout/header.php' ?>

<div class="main-content container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="mb-4">
                            <h4><span style="border-bottom: 3px solid;">Revenues</span></h4>
                        </div>
                        <div>
                            <?php
                                $query = "SELECT SUM(total) AS revenues FROM transactions";
                                $result = mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($result);
                                $revenues = $data['revenues'];
                            ?>
                            <h1>Rp <?= number_format($revenues, 0, 0, '.') ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="mb-4">
                            <h4><span style="border-bottom: 3px solid;">Medicines</span></h4>
                        </div>
                        <div>
                            <?php
                                $query = "SELECT COUNT(id) AS medicines FROM medicines";
                                $result = mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($result);
                                $medicines = $data['medicines'];
                            ?>
                            <h1><?= $medicines ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="mb-4">
                            <h4><span style="border-bottom: 3px solid;">Suppliers</span></h4>
                        </div>
                        <div>
                            <?php
                                $query = "SELECT COUNT(id) AS suppliers FROM suppliers";
                                $result = mysqli_query($koneksi, $query);
                                $data = mysqli_fetch_array($result);
                                $suppliers = $data['suppliers'];
                            ?>
                            <h1><?= $suppliers ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Transactions</h5>
                    <div>
                        <canvas id="transactionsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4">Inventories</h5>
                    <div>
                        <?php
                            $query = "SELECT medicines.name AS medicine, suppliers.name AS supplier, 
                            inventories.quantity, inventories.created_at 
                            FROM inventories JOIN medicines 
                            ON inventories.medicine_id = medicines.id
                            JOIN suppliers
                            ON inventories.supplier_id = suppliers.id 
                            WHERE inventories.deleted_at IS NULL";
                            $result = mysqli_query($koneksi, $query);
                            if(mysqli_num_rows($result) > 0) {
                                while($data = mysqli_fetch_array($result)) {
                        ?>
                        <div class="d-flex align-items-center border-bottom row py-2">
                            <div class="col-md-4">
                                <?= date('d/m/y', strtotime($data['created_at'])) ?>
                            </div>
                            <div class="col-md-6">
                                <div class="font-weight-bold"><?= $data['medicine'] ?></div>
                                <div style="font-size: 8pt;"><?= $data['supplier'] ?></div>
                            </div>
                            <div class="col-md-2">
                                +<?= $data['quantity'] ?>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/vendors/chartjs/Chart.min.js"></script>
<script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>

<script>
    const ctx = document.getElementById('transactionsChart');

    var currentDate = new Date();
    var lastSixMonths = [];
    for (var i = 5; i >= 0; i--) {
        var month = currentDate.getMonth() - i;
        var year = currentDate.getFullYear();

        if (month < 0) {
            month += 12;
            year -= 1;
        }

        var monthName = new Date(year, month, 1).toLocaleString('default', { month: 'short' });

        var formattedDate = `${monthName} ${year}`;
        lastSixMonths.push(formattedDate);
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lastSixMonths,
            datasets: [{
                label: 'Sales Summary',
                data: [12, 19, 3, 5, 10, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php include '../layout/footer.php' ?>
