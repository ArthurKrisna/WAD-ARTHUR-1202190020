<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="style/style.css">
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
  <title>EAD Travel</title>
</head>

<body>
  <div class="header">
  <div class="row">
            <div class="col" style="margin-top: 8px; margin-left: 102px;">
            <a href="index.php"><span class="text text-white">EAD Travel</span></a>
            </div>
            <?php session_start(); ?>
            <div class="col">
                <div class="position-relative" style="margin-left: 50%; margin-top: 8px;">
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
                        <a href="set/logout.php" class="text text-white">Logout</a>
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
  </div>

  <div class="container">
  <form action="set/book.php" method="post">
    <div class="row" style="margin-top: 48px;">
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
    require("config/db.php");
    $sql = "SELECT * FROM wisata";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
      
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <img
              src="<?= $row["gambar"] ?>"
              class="card-img-top" alt="...">
            <div class="card-body">
              <input type="hidden" name="nama" value="<?= $row["nama"] ?>">
              <input type="hidden" name="lokasi" value="<?= $row["lokasi"] ?>">
              <input type="hidden" name="deskripsi" value="<?= $row["deskripsi"] ?>">
              <input type="hidden" name="harga" value="<?= $row["harga"] ?>">

              <h5 class="card-title"><?= $row["nama"] ?>, <?= $row["lokasi"] ?></h5>
              <p class="card-text"><?= $row["deskripsi"] ?></p>
              <hr>
              <p class="card-text">Rp <?= $row["harga"] ?></p>
              <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tanggalModal">Pesan Tiket</a>
            </div>
          </div>
        </div>

       
      <?php    
      }
    }
    ?>
    </div>
     <div class="modal fade" id="tanggalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <input type="date" class="form-control" name="tanggal" placeholder="Username" aria-label="Username"
                aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
          </div>
        </div>
      </div>
    </div>
    </form>
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