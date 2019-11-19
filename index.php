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
    <title>Djogja Event</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="container">
        <header><!-- Ganti Image Logo -->
            <img src="images/logo.svg" alt="Djogja Event" class="logo">

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
                    <li><a href="./register.php">Register</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
        </header>

        <section>
        <!-- image -->
            <img src="images/server.svg" alt="server graphic" class="server">

            <h1>Djogja Event</h1>
            <p class="subhead">Share and search your event.</p>

            <img src="images/scroll.svg" alt="scroll down" class="scroll hide-mobile show-desktop">
        </section>
    </div>

    <div class="blue-container">
        <div class="container">
            <ul>
                <li>
                    <img src="images/icon-1.svg" alt="Calendar icon">
                    <p>Displays the schedule of official and non-official events taking place in Yogyakarta and surrounding areas.</p>
                </li>
                <li>
                    <img src="images/icon-2.svg" alt="Pocket icon">
                    <p>There are free and paid events that can be easily obtained through this website.</p>
                </li>
                <li>
                    <img src="images/icon-3.svg" alt="Handphone icon">
                    <p>Share your organization's events without spending money and get a lot of visitors.</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="gray-container">
        <div class="container">
            <ul>
                <li>
                    <figure>
                        <img src="images/user1.png" alt="User testimonial picture">
                        <!-- Ganti Tulisan Lorem ipsum dibawah ya -->
                        <blockquote>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas tenetur totam,
                            dolore</blockquote>
                        <figcaption>- Jane Doe</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="images/user2.png" alt="User testimonial picture">
                        <!-- Ganti Tulisan Lorem ipsum dibawah ya -->
                        <blockquote>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas tenetur totam,
                            dolore</blockquote>
                        <figcaption>- John Doe</figcaption>
                    </figure>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h2>Get and share your event!</h2>
        <a href="./register.php" class="cta">Register Now</a>
    </div>

    <footer>
        <div class="footer-container">
            <div class="container">
                <a href="./home.php">
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