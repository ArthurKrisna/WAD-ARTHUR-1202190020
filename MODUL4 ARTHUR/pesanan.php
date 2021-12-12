<?php
require("config/db.php");
session_start();
if(isset($_GET['id'])) {
    $id = $_GET["id"];
    // sql to delete a record
    $sql = "DELETE FROM bookings WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Berhasil hapus pesanan";
        header("Location: pesanan.php", true, 301);
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan, coba lagi";
        header("Location:   pesanan.php", true, 301);
        exit();
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <title>WAD Travel</title>
</head>

<body>
    <div class="header">
        <div class="row">
            <div class="col" style="margin-top: 10px; margin-left: 100px;">
                <a href="index.php"><span class="text text-white">WAD Travel</span></a>
            </div>
            <div class="col">
                <div class="position-relative" style="margin-left: 48%; margin-top: 10px;">
                    <a href="profil.php" class="text text-white" style="margin-right: 10px;">Profil</a>
                    <a href="pesanan.php" class="text text-white" style="margin-right: 10px;">Pesanan</a>
                    <a href="register.php" class="text text-white" style="margin-right: 10px;">Register</a>
                    <a href="login.php" class="text text-white">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <?php 
            // session_start();
            if(!empty($_SESSION['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['success'] ?>
            </div>
            <?php }
            $_SESSION['success'] = "";
            ?>
            <?php 
            // session_start();
            if(!empty($_SESSION['error'])) { ?>
            <div class="alert alert-error" role="alert">
                <?= $_SESSION['error'] ?>
            </div>
            <?php }
            $_SESSION['error'] = "";
            ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tempat</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal Perjalanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
        <?php 
        require("config/db.php");
        $sql = "SELECT * FROM bookings";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $no = 1;
        while($row = $result->fetch_assoc()) {
            // $data = $row; 
            ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $row["nama_tempat"] ?></td>
                    <td><?= $row["lokasi"] ?></td>
                    <td><?= $row["tanggal"] ?></td>
                    <td><?= $row["harga"] ?></td>
                    <td><a href="pesanan.php?id=<?= $row["id"] ?>"><button class="btn btn-danger">Hapus</button></a></td>
                </tr>
                <?php $no++; }} ?>
            </tbody>
        </table>
    </div><br>
    <div class="footer" style="margin-top: 450px;">
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