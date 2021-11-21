<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>

    <title>Detail</title>
</head>

<body>
    <?php
    include 'Arthur_config.php';
    $id = $_GET['id'];
    $pilih = "SELECT * FROM buku_table WHERE id_buku = '$id'";
    $book = mysqli_query($connect, $pilih);
    ?>

    <div class="container mb-5">
        <nav class="navbar fixed-top bg-dark navbar-dark p-2 mb-5">
            <a href="Arthur_Home.php">
                <img class="" src="logo-ead.png" width="160px" alt="">
            </a>
            <div class="Topcontainer-fluid">
                <form class="d-flex flex-row-reverse" action="Arthur_Tambah.php">
                    <button class="btn" style="background-color: blue; width: 160px;height: 40px;color: white;" type="submit">Tambah Buku</button>
                </form>
            </div>
        </nav>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-10 bg-white mt-5">
                <div class="card shadow">
                    <p class="text-center fs-1 fw-bolder">Detail Buku </p>
                    <?php foreach ($book as $data) { ?>
                        <img src="IMAGE/<?= $data['gambar'] ?>" width="100px" alt="gambar" class="card-img-top">
                        <hr >
                        <div class="card-body">
                            <p class="card-title">Judul Buku:</p>
                            <p class="fs-5 card-text"><?= $data['judul_buku'] ?></p>

                            <p class="card-title">Penulis:</p>
                            <p class="fs-5 card-text"><?= $data['penulis_buku'] ?></p>

                            <p class="card-title">Tahun:</p>
                            <p class="fs-5 card-text"><?= $data['tahun_terbit'] ?></p>

                            <p class="card-title">Deskripsi:</p>
                            <p class="fs-5 card-text"><?= $data['deskripsi'] ?></p>

                            <p class="card-title">Bahasa:</p>
                            <p class="fs-5 card-text"><?= $data['bahasa'] ?></p>

                            <p class="card-title">Tag:</p>
                            <p class="fs-5 card-text"><?= $data['tag'] ?></p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#edit" type="button">edit</button>
                                <a class="btn btn-danger w-50" href="Arthur_Delete.php?id=<?= $data['id_buku'] ?>" type="button">Hapus</a>
                            </div>
                            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="" action="Arthur_DetailPHP.php" method="POST" enctype="multipart/form-data">
                                                <div class="row justify-content-center mt-5">
                                                    <div class="col-10">
                                                        <div class="justify-content-center  mb-3">
                                                            <?= "<img src='IMAGE/$data[gambar]' width='300' height='400' />"; ?>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="Judul" class="form-label fw-bold">Judul Buku</label>
                                                            <input type="text" name="judul_buku" class="form-control" id="judul" value="<?= $data['judul_buku'] ?>">
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="disabledTextInput" class="form-label fw-bold">Penulis</label>
                                                            <input class="form-control" type="text" name="penulis_buku" value="<?= $data['penulis_buku'] ?>" aria-label="Arthur_1202190020" readonly>
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Tahun" class="form-label fw-bold">Tahun Terbit</label>
                                                            <input type="number" name="tahun_terbit" class="form-control" id="tahun" value="<?= $data['tahun_terbit'] ?>">
                                                        </div>

                                                        <div class="mb-2">
                                                            <label for="Deskripsi" class="form-label fw-bold">Deskripsi</label>
                                                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" value><?= $data['deskripsi'] ?></textarea>
                                                        </div>

                                                        <div class="row mb-2">
                                                            <legend class="col-form-label col-sm-2 pt-0 fw-bold">Bahasa</legend>
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input" id="radio1" name="bahasa" value="Bahasa Indonesia" <?= $data['bahasa'] == 'Bahasa Indonesia' ? 'checked' : '' ?>>Bahasa Indonesia
                                                                    <label class="form-check-label" for="radio1"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input" id="radio2" name="bahasa" value="Lainnya" <?= $data['bahasa'] == 'Lainnya' ? 'checked' : '' ?>>Lainnya
                                                                    <label class="form-check-label" for="radio2"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $tag = explode(',', $data['tag']);
                                                        ?>

                                                        <div class="mb-3">
                                                            <legend class="col-form-label col-sm-2 pt-0 fw-bold">Tag</legend>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="Pemrograman" value="Pemrograman" <?= in_array('Pemrograman', $tag) ? 'checked' : '' ?>>
                                                                <label class="form-check-label" for="Tunai">Pemrograman</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="Website" value="Website" <?= in_array('Website', $tag) ? 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">Website</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="Java" value="Java" <?= in_array('Java', $tag) ? 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">Java</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="OOP" value="OOP" <?= in_array('OOP', $tag) ? 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">OOP</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="MVC" value="MVC" <?= in_array('MVC', $tag) ? print 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">MVC</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="Kalkulus" value="Kalkulus" <?= in_array('Kalkulus', $tag) ? 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">Kalkulus</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="tag[]" id="Lainnya" value="Lainnya" <?= in_array('Lainnya', $tag) ? 'checked' : ''; ?>>
                                                                <label class="form-check-label" for="transfer">Lainnya</label>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="File" class="form-label fw-bolder">Gambar</label>
                                                            <input class="form-control" name="gambar" type="file" id="File">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <footer class="text-center m-5">
        <img class="" src="logo-ead.png" width="160px" alt="" style="margin-bottom: 16px;">
        <h2 style="font-weight: 700;">Perpustakaan EAD</h2>
        <p>Arthur_1202190020</p>
    </footer>
</body>

</html>