<?php
    include 'Arthur_config.php';
    $id = rand();
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun = $_POST ['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = implode(",", $_POST['tag']);
    $id = $_GET['id'];
    $ekstensi =  array('png','jpg','jpeg','gif');
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $info = pathinfo($nama, PATHINFO_EXTENSION);
    $gambar = $id."_".$namafile;
	move_uploaded_file($_FILES['gambar']['tmp_name'], 'IMAGE/'.$gambar);

	$update = mysqli_query($connect, "UPDATE buku_table SET judul_buku ='$judul', penulis_buku = '$penulis', tahun_terbit='$tahun', deskripsi='$deskripsi', tag='$tag',bahasa='$bahasa' WHERE id_buku ='$id'");

	header("location:Arthur_Home.php");
?>