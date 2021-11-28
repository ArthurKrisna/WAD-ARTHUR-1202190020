<?php
    include 'Arthur_config.php';
    $id = rand();
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis_buku'];
    $tahun = $_POST ['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = implode(",", $_POST['tag']);
    $exstension =  array('png','jpg','jpeg','gif');
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $info = pathinfo($namafile, PATHINFO_EXTENSION);
    $gambar = $id."_".$namafile;
	move_uploaded_file($_FILES['gambar']['tmp_name'], 'IMAGE/'.$gambar);

	$input = mysqli_query($connect, "INSERT INTO buku_table VALUES('$id','$judul','$penulis','$tahun','$deskripsi', '$gambar', '$tag', '$bahasa')");
    
	header("location:Arthur_Home.php");
?>