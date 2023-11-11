<?php 
    include '../layout/header.php'; 
    $id = $_GET['id'];
    $query = "SELECT * FROM medicines WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($result);
?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h4>Edit Medicine :</h4>
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
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="<?= $data['name'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option disabled selected>- Select Type -</option>
                                        <option value="liquid" <?= ($data['type'] == 'liquid') ? 'selected' : '' ?>>Liquid</option>
                                        <option value="capsule" <?= ($data['type'] == 'capsule') ? 'selected' : '' ?>>Capsule</option>
                                        <option value="tablet" <?= ($data['type'] == 'tablet') ? 'selected' : '' ?>>Tablet</option>
                                        <option value="powder" <?= ($data['type'] == 'powder') ? 'selected' : '' ?>>Powder</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" value="<?= $data['price'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" id="stock" name="stock" value="<?= $data['stock'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additionals">Additionals</label>
                                    <input type="text" id="additionals" name="additionals" value="<?= $data['additionals'] ?>" class="form-control">
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
