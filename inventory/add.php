<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h4>New Inventory :</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="query_add.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT max(id) as code FROM inventories");
                                        $data = mysqli_fetch_array($query);
                                        $code = $data['code'];
                                        $date = substr($code, 2, 6);
                                        if($date == date('ymd')) {
                                            $number = (int) substr($code, 8, 3);
                                        } else {
                                            $number = 0;
                                        }
                                        $number++;
                                        $id = "IN" . date('ymd') . sprintf("%03s", $number);
                                    ?>
                                    <input type="text" id="id" name="id" class="form-control" value="<?= $id ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medicine">Medicine</label>
                                    <select name="medicine" id="medicine" class="form-select" required>
                                        <option disabled selected>- Select Medicine -</option>
                                        <?php
                                            $query = "SELECT * FROM medicines WHERE deleted_at IS NULL";
                                            $result = mysqli_query($koneksi, $query);
                                            if(mysqli_num_rows($result) > 0) {
                                                while($med = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?= $med['id'] ?>"><?= $med['id'] . " - " . $med['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select name="supplier" id="supplier" class="form-select" required>
                                        <option disabled selected>- Select Supplier -</option>
                                        <?php
                                            $query = "SELECT * FROM suppliers WHERE deleted_at IS NULL";
                                            $result = mysqli_query($koneksi, $query);
                                            if(mysqli_num_rows($result) > 0) {
                                                while($med = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?= $med['id'] ?>"><?= $med['id'] . " - " . $med['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additionals">Additionals</label>
                                    <input type="text" id="additionals" name="additionals" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <div>
                                    <a href="index.php" class="btn icon icon-left btn-danger mr-1"><i data-feather="corner-up-left" width="20"></i> Back</a>
                                </div>
                                <div class="ml-2">
                                    <button type="submit" class="btn icon icon-left btn-success ml-1"><i data-feather="check-circle" width="20"></i> Save Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
