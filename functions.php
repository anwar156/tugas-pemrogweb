<?php

function koneksi(){

    // koneksi ke database
    $conn = mysqli_connect("localhost", "clevo", "12345678") or die("Koneksi ke database GAGAL!");

    mysqli_select_db($conn, "djogjaevent") or die("Database salah!");

    return $conn;
}

function register($conn, $post = array()){
    
    // query sql 
    $query = sprintf("INSERT INTO user (user_login, user_email, user_pass, display_name)
        VALUES ('%s', '%s', '%s', '%s')", $post["username"], $post["user_email"], $post["user_pass"], $post["name"]);

    // execute query
    mysqli_query($conn, $query);

    // mengembalikkan jumlah baris yang terpengaruhi
    return mysqli_affected_row($conn)
}


?>