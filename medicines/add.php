<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h4>New Medicine :</h4>
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
                                        $query = mysqli_query($koneksi, "SELECT max(id) as code FROM medicines");
                                        $data = mysqli_fetch_array($query);
                                        $number = (int) substr($data['code'], 3, 5);
                                        $number++;
                                        $id = "MD-" . sprintf("%05s", $number);
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
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option disabled selected>- Select Type -</option>
                                        <option value="liquid">Liquid</option>
                                        <option value="capsule">Capsule</option>
                                        <option value="tablet">Tablet</option>
                                        <option value="powder">Powder</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" id="stock" name="stock" class="form-control" required>
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
