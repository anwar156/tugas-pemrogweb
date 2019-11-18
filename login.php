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
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="./register.php">Register</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
        </header>

        <section>

            <div class="form-container">
                <form action="#" method="POST">
                    <h1>Login Djogja Event Organizer</h1>
                    <img src="images/server.svg" alt="server graphic" class="server">

                    <div class="group">
                        <input type="text" name="username" id="username" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Username or Email</label>
                    </div>

                    <div class="group">
                        <input type="password" name="password" id="password" required="required"><span
                            class="highlight"></span><span class="bar"></span>
                        <label>Password</label>
                    </div>

                    <div class="btn-box">
                        <button class="btn btn-submit" name="login" type="submit">Login</button>
                    </div>

                </form>

                <?php

                // koneksi ke database
                $conn = koneksi();

                if(isset($_POST["login"])){
                    
                    // filter input user
                    $username_or_email = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $user_pass = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

                    $post = array(
                        "username_or_email" => $username_or_email,
                        "user_pass" => $user_pass
                    );

                    // Memanggil fungsi login + memulai session
                    login($conn, $post);
                }
                ?>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer-container">
            <div class="container">
                <a href="#">
                    <img src="images/logo-white.svg" class="logo" alt="logo">
                </a>
                <p class="address">Melrose Place, 90210<br>USA</p>
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