<?php
    session_start();
    if(!$_SESSION['login']) {
        if(!$_SESSION['login']) {
            $_SESSION['error'] = "Silahkan login terlebih dahulu";
            header("Location: login.php", true, 301);
            exit();
        }
    }
    if(isset($_COOKIE['login'])) {
        if($_COOKIE['login']) {
            require("config/db.php");
            $id = $_COOKIE['user_id'];
            $sql = "SELECT * FROM users WHERE id='$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user = $row;    
            }
            }
            
        }
    } else {
        require("config/db.php");
        $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id='$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user = $row;    
            }
            }
    }
    
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style/style.css">
    <?php  ?>
    <?php if(isset($_COOKIE['nav'])) {
        if($_COOKIE['nav'] == 'blue') { ?>
        <style>
            .header {
                background-color: blue;
            }
            .footer {
                background-color: blue;
            }
        </style>
    <?php } } ?>

    <?php if(isset($_COOKIE['nav'])) {
        if($_COOKIE['nav'] == 'green') { ?>
        <style>
            .footer {
                background-color: green;
            }
            .header {
                background-color: green;
            }
        </style>
    <?php } } ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>WAD Travel</title>
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="col" style="margin-top: 10px; margin-left: 100px;">
            <a href="index.php"><span class="text text-white">WAD Travel</span></a>
            </div>
            <?php //session_start(); ?>
            <div class="col">
                <div class="position-relative" style="margin-left: 50%; margin-top: 10px;">
                    <?php if(isset($_SESSION['login'])) {
                        ?>
                    <a href="profil.php" class="text text-white" style="margin-right: 10px;">Profil</a>
                    <a href="pesanan.php" class="text text-white" style="margin-right: 10px;">Pesanan</a>
                    <?php } ?>
                    <a href="register.php" class="text text-white" style="margin-right: 10px;">Register</a>
                    <a href="login.php" class="text text-white">Login</a>
                    <?php
                    if(isset($_SESSION['login'])) {
                        ?>
                        <a href="logout.php" class="text text-white">Logout</a>
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php //session_start(); ?>
    <div class="container">
        <?php 
        if(!empty($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>
        <?php }
        $_SESSION['success'] = "";
        ?>
        <?php 
        if(!empty($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
        <?php }
        $_SESSION['error'] = "";
        ?>
        <div class="row" style="margin-top: 20px;">
            <form action="set/profil.php" method="POST">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" name="email" id="staticEmail"
                            value="<?= $user['email'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="staticEmail"
                            value="<?= $user['nama'] ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_hp" id="staticEmail"
                            value="<?= $user['no_hp'] ?>">
                    </div>
                </div>
                <hr>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Kata Sandi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" id="staticEmail">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="konfirmasi_password" id="staticEmail">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Warna Navbar</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="nav">
                            <option selected>Pilih Warna</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="row">
            <div class="col" style="text-align: center; margin-top: 10px;">
                <span class="text text-white">&copy;2021 Copyright: <a href="#" data-bs-toggle="modal" data-bs-target="#nimModal">NIM/NAMA</a></span>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nimModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Created By</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Nama : Arthur Krisna Resano
            <br>
            NIM : 1202190020
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>