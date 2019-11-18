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
    session_destroy();
}

function login($conn, $post = array()){

    // query sql
    $query = sprintf("SELECT password, id FROM user 
        WHERE email = '%s' OR username = '%s'", $post["username_or_email"], $post["username_or_email"]);

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
        if(password_verify($post["user_pass"], $row["password"])){

            // start session
            session_mulai($row[id]);

            return true;
        }else{
            echo "password salah";

            return false;
        }
    }
}

?>