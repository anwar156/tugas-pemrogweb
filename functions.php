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
    return mysqli_affected_rows($conn);
}

function login($conn, $post = array()){

    // query sql
    $query = sprintf("SELECT user_pass, user_login FROM user 
        WHERE user_email = '%s' OR user_login = '%s'", $post["username_or_email"], $post["username_or_email"]);

    // execute query
    $result = mysqli_query($conn, $query);

    // jika email tidak ditemukan
    if(!mysqli_affected_rows($conn)){
        echo "User tidak ditemukan";

        return false;
    }
    // jika email ditemukan
    else{
        
        // Mengambil data dari sql query
        $row = array();
        $row = mysqli_fetch_assoc($result);

        // print_r($row);

        // cek password
        if(password_verify($post["user_pass"], $row["user_pass"])){

            // start session
            session_start();
            $_SESSION = $user["user_login"];

            return true;
        }else{
            echo "password salah";

            return false;
        }
    }
}


?>