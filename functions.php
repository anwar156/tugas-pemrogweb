<?php

function koneksi(){
    // koneksi ke database
    $conn = mysqli_connect("localhost", "clevo", "12345678") or die("Koneksi ke database GAGAL!");

    mysqli_select_db($conn, "djogjaevent") or die("Database salah!");

    return $conn;
}



?>