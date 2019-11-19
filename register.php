<?php 

require "functions.php";

session_cek();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Djogja Event</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/form.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="images/logo.svg" alt="23andfour logo" class="logo">

            <nav>
                <a href="#" class="hide-desktop">
                    <img src="images/ham.svg" alt="toggle menu" class="menu" id="menu">
                </a>

                <ul class="show-desktop hide-mobile" id="nav">
                    <li id="exit" class="exit-btn hide-desktop">
                        <img src="images/exit.svg" alt="exit menu">
                    </li>
                    <li><a href="./home.php">Home</a></li>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
        </header>

        <section>

            <div class="form-container">
                <form action="#" method="POST">
                    <h1>Register Djogja Event</h1>
                    <img src="images/server.svg" alt="server graphic" class="server">

                    <div class="group">
                        <input type="text" name="name" id="name" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Name</label>
                    </div>

                    <div class="group">
                        <input type="text" name="username" id="username" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Username</label>
                    </div>

                    <div class="group">
                        <input type="email" name="email" id="email" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Email</label>
                    </div>

                    <div class="group">
                        <input type="password" name="password" id="password" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Password</label>
                    </div>

                    <div class="group">
                        <input type="password" name="confirm-password" id="confirm-password" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Confirm Password</label>
                    </div>

                    <div class="btn-box">
                        <button class="btn btn-submit" name="register" type="submit">Register</button>
                    </div>

                </form>
                <?php
                
                // Konek ke database
                $conn = koneksi();

                if(isset($_POST["register"])){

                    // filter input user
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                    $pass = null;

                    // cek password dan confirm-password
                    if($_POST["password"] === $_POST["confirm-password"]){
                        // password enkripsi dengan hash
                        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    } 

                    $post = array(
                        "username" => $username,
                        "user_email" => $email,
                        "user_pass" => $pass,
                        "name" => $name
                    );

                    // Memanggil fungsi register
                    if(register($conn, $post)){
                        $pesan = "Register success!";

                        // memulai session
                        session_mulai($post["username"]);
                    }
                    else {
                        $pesan = "Register failed!";
                    }
                }

                ?>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer-container">
            <div class="container">
                <a href="./index.php">
                    <img src="images/logo-white.svg" class="logo" alt="logo">
                </a>
                <p class="address">UGM Yogyakarta<br>Indonesia</p>
                <ul class="footer-links">
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>

        var menu = document.getElementById('menu');
        var nav = document.getElementById('nav');
        var exit = document.getElementById('exit');

        menu.addEventListener('click', function (e) {
            nav.classList.toggle('hide-mobile');
            e.preventDefault();
        });

        exit.addEventListener('click', function (e) {
            nav.classList.add('hide-mobile');
            e.preventDefault();
        });
    </script>
</body>

</html>