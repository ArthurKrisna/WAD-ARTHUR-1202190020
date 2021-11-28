<?php
require("../config/db.php");

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$nohp = $_POST['no_hp'];
$passwordHash = md5($password);
$sql = "INSERT INTO users (nama, email, password, no_hp)
VALUES ('$nama', '$email', '$passwordHash', '$nohp')";

if ($conn->query($sql) === TRUE) {
  session_start();
  $_SESSION['success'] = "Berhasil registrasi";
    header("Location: ../login.php", true, 301);
    exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();