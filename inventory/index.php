<?php include '../layout/header.php'; ?>

<div class="main-content container-fluid">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>Inventories</h4>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first text-right">
                <a href="add.php" class="btn icon icon-left btn-primary"><i data-feather="plus" width="20"></i> New Inventory</a>
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
                            <th class="text-center"><i data-feather="more-horizontal" width="20"></i></th>
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
                            <td colspan="6" class="text-center">No data available</td>
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
