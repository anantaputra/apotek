<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Medicines</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="add.php" class="btn icon icon-left btn-primary"><i data-feather="plus" width="20"></i> New Medicine</a>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 12%;">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Additionals</th>
                            <th class="text-center"><i data-feather="more-horizontal" width="20"></i></th>
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
                            <td class="text-center"><?= ucwords($data['type']) ?></td>
                            <td class="text-right">Rp <?= number_format($data['price'], 0, 0, '.') ?></td>
                            <td class="text-center"><?= $data['stock'] ?></td>
                            <td><?= $data['additionals'] ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $data['id'] ?>" class="text-warning"><i data-feather="edit-3" width="20"></i></i></a> |
                                <a onclick="hapus('<?= $data['id'] ?>')" class="text-danger" data-toggle="modal" data-target="#modal-delete"><i data-feather="trash" width="20"></i></a>
                            </td>
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
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this data ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                    <a id="delete" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus(id)
    {
        document.querySelector('#delete').href = 'query_delete.php?id='+id;
    }
</script>

<?php include '../layout/footer.php'; ?>
