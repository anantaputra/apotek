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
        <div class="container" style="margin-top: -3rem;">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <img src="assets/icon.jpg" height="150" class='mb-4'>
                                <h3>Apotek Application</h3>
                                <p>Login</p>
                                <?php 
                                    if(isset($_GET['message'])){
                                        if($_GET['message'] == "failed"){
                                            echo "Login gagal! username dan password salah!";
                                        }
                                        else if($_GET['message'] == "logout"){
                                            echo "Anda telah berhasil logout";
                                        }
                                        else if($_GET['message'] == "unauthorized"){
                                            echo "Anda harus login untuk mengakses halaman admin";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <form action="query_login.php" method="post">
                                        <div class="form-group has-icon-left">
                                            <label for="username">Username</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" id="username" name="username" value="admin">
                                                <div class="form-control-icon">
                                                    <i data-feather="user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <label for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" id="password" name="password" value="123">
                                                <div class="form-control-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
                                        </div>
                                        <div class="text-center">
                                            <a href="index.php" class="btn btn-danger btn-block mt-2">Main Menu</a>
                                        </div>
                                    </form>
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
