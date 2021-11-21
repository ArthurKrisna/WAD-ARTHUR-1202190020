<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous">
    </script>
    <title>Tambah Buku</title>
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
    
    <div class="container mt-4">
        <div class="row justify-content-center mt-3">
            <div class="col-11 shadow-sm bg-white mt-3">
                <form class="mt-4" action="Arthur_TambahPHP.php" method="POST" enctype="multipart/form-data">
                    <p class="text-center fs-2 fw-bold">Tambah Buku </p>
                    <div class="row justify-content-center mt-4">
                        <div class="col-11">

                            <div class="mb-2">
                                <label for="Judul" class="form-label fw-bold">Judul Buku</label>
                                <input type="text" name="judul_buku" class="form-control" id="judul">
                            </div>
                            
                            <div class="mb-2">
                                <label for="disabledTextInput" class="form-label fw-bold">Penulis</label>
                                <input class="form-control" type="text" name="penulis_buku" value="Arthrur_1202190020" aria-label="Arthur_1202190020" readonly>
                            </div>

                            <div class="mb-2">
                                <label for="Tahun" class="form-label fw-bold">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control" id="tahun">
                            </div>

                            <div class="mb-2">
                                <label for="Deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>

                            <div class="row mb-2">
                                <legend class="col-form-label col-sm-2 pt-0 fw-bold">Bahasa</legend>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="option1" name="bahasa" value="Bahasa Indonesia">Bahasa Indonesia
                                        <label class="form-check-label" for="option"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="option2" name="bahasa" value="Lainnya">Lainnya
                                        <label class="form-check-label" for="option2"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <legend class="col-form-label col-sm-2 pt-0 fw-bold">Tag</legend>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Pemrograman" value="Pemrograman">
                                    <label class="form-check-label" for="Tunai">Pemrograman</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Website" value="Website">
                                    <label class="form-check-label" for="transfer">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Java" value="Java">
                                    <label class="form-check-label" for="transfer">Java</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="OOP" value="OOP">
                                    <label class="form-check-label" for="transfer">OOP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="MVC" value="MVC">
                                    <label class="form-check-label" for="transfer">MVC</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Kalkulus" value="Kalkulus">
                                    <label class="form-check-label" for="transfer">Kalkulus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tag[]" id="Lainnya" value="Lainnya">
                                    <label class="form-check-label" for="transfer">Lainnya</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="formFile" class="form-label fw-bold">Gambar</label>
                                <input class="form-control" name="gambar" type="file" id="formFile">
                            </div>

                            <div class="d-grid gap-2 col-10 mx-auto p-5">
                                <button class="btn btn-primary" type="submit">+ TAMBAH</button>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div><br>
    <footer class="justify-content-center text-center mt-5 p-5">
        <img class="" src="logo-ead.png" width="220px" alt="" style="margin-bottom: 8px;">
        <h4 style="font-weight: 660;">Perpustakaan EAD</h4>
        <p>Arthur_1202194330</p>
    </footer>
</body>
</html>