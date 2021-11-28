<?php
require("../config/db.php");
session_start();
    $userId = $_SESSION['user_id'];
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $tgl = $_POST['tanggal'];
    if(!$_SESSION['login']) {
        $_SESSION['error'] = "Silahkan login terlebih dahulu";
        header("Location: ../login.php", true, 301);
        exit();
    }
    $sql = "INSERT INTO bookings (user_id, nama_tempat, lokasi, harga, tanggal)
    VALUES ('$userId', '$nama', '$lokasi', '$harga', '$tgl')";

    if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['success'] = "Berhasil memesan tiket";
        header("Location: ../index.php", true, 301);
        exit();
    } else {
        session_start();
        $_SESSION['error'] = "Terjadi kesalahan, coba lagi";
        header("Location: ../index.php", true, 301);
        exit();
    }

    $conn->close();
