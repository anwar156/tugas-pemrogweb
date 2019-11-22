<?php

function koneksi(){

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "12345678") or die("Koneksi ke database GAGAL!");

    mysqli_select_db($conn, "djogjaEvent") or die("Database Error!");

    return $conn;
}

function register($conn, $post = array()){
    
    // query sql 
    $query = sprintf("INSERT INTO user (user_displayname, user_username, user_email, user_pass)
        VALUES ('%s', '%s', '%s', '%s')", $post["name"], $post["username"], $post["user_email"], $post["user_pass"]);

    // execute query
    mysqli_query($conn, $query);

    // mengembalikkan jumlah baris yang terpengaruhi
    return mysqli_affected_rows($conn);
}

// Memulai session
function session_mulai($username){
    session_start();
    $_SESSION["username"] = $username;

    header("Location: home.php");
}

// cek session
function session_cek(){
    session_start();

    // user sudah login
    if(isset($_SESSION["username"])){

        // pindah ke halaman home
        header("Location: home.php");
    }
}

// Hapus session untuk log
function destroy_session(){
    // remove dan destroy variable session
    session_unset();
    $status = session_destroy();

    // Apabila session kosong
    if($status){
        header("Location: index.php");
    }
}

function login($conn, $post = array()){

    // query sql
    $query = sprintf("SELECT user_pass, user_username FROM user 
        WHERE user_email = '%s' OR user_username = '%s'", $post["username_or_email"], $post["username_or_email"]);

    // execute query
    $result = mysqli_query($conn, $query);

    // jika email tidak ditemukan
    if(!mysqli_affected_rows($conn)){
        echo "Username atau Email belum terdaftar!";

        return false;
    }
    
    // jika email ditemukan
    else{
        
        // Mengambil data dari sql query
        $row = array();
        $row = mysqli_fetch_assoc($result);

        // cek password
        if(password_verify($post["user_pass"], $row["user_pass"])){

            // start session
            session_mulai($row["user_username"]);

            return true;
        }else{
            echo "password salah";

            return false;
        }
    }
}

?>