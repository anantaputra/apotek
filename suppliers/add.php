<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h4>New Supplier :</h4>
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
                                        $query = mysqli_query($koneksi, "SELECT max(id) as code FROM suppliers");
                                        $data = mysqli_fetch_array($query);
                                        $number = (int) substr($data['code'], 3, 5);
                                        $number++;
                                        $id = "SP-" . sprintf("%04s", $number);
                                    ?>
                                    <input type="text" id="id" name="id" class="form-control" value="<?= $id ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
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
