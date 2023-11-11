<?php 
    include '../layout/header.php'; 
    $id = $_GET['id'];
    $query = "SELECT * FROM inventories WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h4>Edit Inventory :</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="query_edit.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" id="id" name="id" class="form-control" value="<?= $data['id'] ?>" readonly>
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
                                        <option value="<?= $med['id'] ?>" <?= ($data['medicine_id'] == $med['id']) ? 'selected' : '' ?>><?= $med['id'] . " - " . $med['name'] ?></option>
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
                                                while($sup = mysqli_fetch_array($result)) {
                                        ?>
                                        <option value="<?= $sup['id'] ?>" <?= ($data['supplier_id'] == $sup['id']) ? 'selected' : '' ?>><?= $sup['id'] . " - " . $sup['name'] ?></option>
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
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="<?= $data['quantity'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additionals">Additionals</label>
                                    <input type="text" id="additionals" name="additionals" class="form-control" value="<?= $data['additionals'] ?>">
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
