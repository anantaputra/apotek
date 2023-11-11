<?php
    include '../koneksi.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek</title>
    
    <link rel="shortcut icon" href="../assets/icon.jpg" type="image/x-icon">
    
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="../assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

</head>

<body>
    <div id="auth">
        <div class="container">
            <?php if(isset($_GET['error'])) {?>
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Medicine stock is not enough</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <?php } ?>

            <div class="content content-full">
                <div class=" text-right mb-3">
                    <a type="button" class="btn icon icon-left btn-danger" href="../index.php">Main Menu</a>
                </div>
                <form action="query_store.php" method="post">
                    <div class="card">
                        <div class="card-body bg-white-op-90">
                            <div class="row">
                                <div class="col-md-6 py-2">
                                    <h4>Date: <?= date("d-m-Y"); ?></h4>
                                </div>
                                <div class="col-md-6 text-right py-2">
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT max(id) as code FROM transactions");
                                        $data = mysqli_fetch_array($query);
                                        $code = $data['code'];
                                        $date = substr($code, 2, 6);
                                        if($date == date('ymd')) {
                                            $number = (int) substr($code, 8, 3);
                                        } else {
                                            $number = 0;
                                        }
                                        $number++;
                                        $transaction_code = "TR" . date('ymd') . sprintf("%03s", $number);
                                    ?>
                                    <h5>ID-Transaksi : <?= $transaction_code ?></h5>
                                    <input type="hidden" name="id" value="<?= $transaction_code ?>">
                                </div>
                                <div class="col-md-12"><hr><hr></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-3">
                                    <h5> List Medicines :</h5>
                                </div>
                                <div class="col-md-6 text-right mb-3 py-3">
                                    <button type="button" class="btn icon icon-left btn-info" data-toggle="modal" data-target="#modal-medicine"><i data-feather="plus" width="20"></i> Add Medicine</button>
                                </div>
                                <div class="col-md-12">
                                    <table class='table table-striped' id="table1">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 2%;">No.</th>
                                                <th class="text-center">Med ID - Medicine</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center"><i data-feather="more-horizontal" width="20"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = "SELECT transactions_temp.id, medicines.id AS medicine_id, medicines.name AS medicine, medicines.type AS medicine_type, medicines.price AS medicine_price, transactions_temp.quantity
                                                FROM transactions_temp JOIN medicines 
                                                ON transactions_temp.medicine_id = medicines.id";
                                                $result = mysqli_query($koneksi, $query);
                                                $no = 1;
                                                $subtotal = 0;
                                                if(mysqli_num_rows($result) > 0) {
                                                    while($data = mysqli_fetch_array($result)) {
                                                        $subtotal += $data['medicine_price'] * $data['quantity'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?>.</td>
                                                <td><?= $data['medicine_id'] ?> - <?= $data['medicine'] ?></td>
                                                <td class="text-center"><?= ucwords($data['medicine_type']) ?></td>
                                                <td class="text-right">Rp <?= number_format($data['medicine_price'], 0, 0, '.') ?></td>
                                                <td class="text-center"><?= $data['quantity'] ?></td>
                                                <td class="text-right">Rp <?= number_format($data['medicine_price'] * $data['quantity'], 0, 0, '.') ?></td>
                                                <td class="text-center">
                                                    <a href="query_delete.php?id=<?= $data['id'] ?>" class="text-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                        </svg>
                                                    </a>
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
                            <div class="row py-4">
                                <div class="col-md-7">
            
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Subtotal </p>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <p>: Rp </p>
                                        </div>
                                        <div class="col-md-7 text-right pr-4">
                                            <?= number_format($subtotal, 0, 0, '.') ?>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Cash </p>
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <p>: Rp </p>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control text-right" id="cash" placeholder="0">
                                        </div>
            
                                        <div class="col-md-5">
                                        </div>
                                        <div class="col-md-7">
                                            <button type="button" class="btn btn-info btn-block" id="bayar"><i class="fa fa-dollar"></i> <b>Cashback</b></button>
                                        </div>
            
                                            <div class="col-md-3">
                                        </div>
                                        <div class="col-md-2 text-right mt-4">
                                            <p>Rp.</p>
                                        </div>
                                        <div class="col-md-7 mt-3">
                                            <input type="text" class="form-control text-right" id="cashback" placeholder="0" name="cashback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> FINISH TRANSACTION</button>
                        </div>
                    </div>
                </form>
            </div>
                        
        </div>
    </div>

    <div class="modal fade text-left" id="modal-medicine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <form action="query_medicine.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Add Medicine</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div hidden>
                                    <input type="text" class="form-control" name="id" value="<?= $transaction_code ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Medicine</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="medicine">
                                        <option selected disabled>- Pilih -</option>
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
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Quantity</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="quantity" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-info text-white">
                            <i class="fa fa-plus"></i> Insert Medicine
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/feather-icons/feather.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/vendors.js"></script>
    <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        document.querySelector('#bayar').onclick = function() { bayar() }
        
        function bayar() 
        {
            var cash = document.querySelector('#cash').value.replace('.', '');
            var cashback = parseInt(cash) - parseInt(<?= $subtotal ?>);
            document.querySelector('#cashback').value = convertRupiah(""+cashback, "");
        }
    </script>
    <script>
        var cash = document.getElementById("cash");

        cash.addEventListener("keyup", function(e) {
            cash.value = convertRupiah(this.value, "");
        });

        cash.addEventListener('keydown', function(event) {
            return isNumberKey(event);
        });
        
        function convertRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split  = number_string.split(","),
            sisa   = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }
        
            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
        }
        
        function isNumberKey(evt) {
            key = evt.which || evt.keyCode;
            if ( 	key != 188 // Comma
                && key != 8 // Backspace
                && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
                && (key < 48 || key > 57) // Non digit
                ) 
            {
                evt.preventDefault();
                return;
            }
        }
    </script>
</body>
</html>
