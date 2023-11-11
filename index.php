<?php include 'migrations.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek</title>
    <link rel="shortcut icon" href="assets/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <img src="assets/icon.jpg" height="150" class='mb-4'>
                                <h3>Apotek Application</h3>
                                <p><b>Menu</b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <a href="cashier/index.php" class="btn btn-primary btn-block">
                                        <div class="d-flex align-items-center justify-content-center font-weight-bold">
                                            <div><i data-feather="dollar-sign" width="20"></i></div>
                                            <div class="ml-2">Cashier</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <a href="login_admin.php" class="btn btn-info btn-block">
                                        <div class="d-flex align-items-center justify-content-center font-weight-bold">
                                            <div><i data-feather="user" width="20"></i></div>
                                            <div class="ml-2">Admin</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>

</html>
