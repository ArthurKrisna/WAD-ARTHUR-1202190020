<?php
    include 'Arthur_config.php';
    $id = $_GET['id'];
    $query = "DELETE FROM buku_table WHERE id_buku ='$id'";
    $hapus = mysqli_query($connect, $query);

    header('location:Arthur_Home.php');
?>