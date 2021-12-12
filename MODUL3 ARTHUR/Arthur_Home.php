<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<title>Arthur_Home</title>
</head>

<body>
    <div class="container-fluid mb-5">
        <nav class="navbar fixed-top bg-dark navbar-dark py-2 mb-5">
            <a href="Arthur_Home.php">
                <img class="" src="logo-ead.png" width="170px" alt="">
            </a>
            <div class="Topcontainer-fluid">
                <form class="d-flex " action="Arthur_Tambah.php">
                    <button class="btn" style="background-color: blue; width: 170px;height: 42px;color: white;" type="submit">Tambah Buku</button>
                </form>
            </div>
        </nav>
    </div>
    <br><br>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-11 d-flex justify-content-center ">
                <?php
                include "Arthur_config.php";
                $pilih = "SELECT * FROM Buku_table";
                $query = mysqli_query($koneksi, $pilih);
                $row = mysqli_num_rows($query);
                if ($row == 0) { ?>
                    <div class="col mt-5">
                        <h3 class="text-center mt-5">Belum Ada Buku</h3>
                        <hr >
                        <p class="text-center mb-5">Silahkan Menambahkan Buku</p>
                    </div>
                    <?php } else {
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-4 card mx-2">
                            <img src="IMAGE/<?= $data['gambar'] ?>" class="card-img-top"  height="500px">
                            <div class="card-body">
                                <h2 class="card-title"><?= $data['judul_buku'] ?></h2>
                                <p class="card-text"><?= $data['deskripsi'] ?></p>
                                <a class="btn btn-primary" href="Arthur_Detail.php?id=<?= $data['id_buku'] ?>">Tampilkan Lebih Lanjut</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer class="justify-content-center text-center mt-5 p-5">
        <img class="" src="logo-ead.png" width="220px" alt="" style="margin-bottom: 8px;">
        <h4 style="font-weight: 660;">Perpustakaan EAD</h4>
        <p>Arthur_1202194330</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>