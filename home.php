<?php

// Session tidak ada
session_start();
if(!isset($_SESSION["username"])){
    echo '<script language="javascript">alert("Anda Harus Login Dulu!"); document.location="login.php";</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Djogja Event Organizer</title>
    <link rel="stylesheet" href="./css/main-home.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container-header">
        <header>
            
            <img src="./images/logo.svg" alt="Djogja Event" class="logo">

            <form action="#" method="GET">
                <input type="text" name="search" placeholder="Search">
                <button><img src="./images/search.svg" alt="Search"></button>
            </form>            
            
            <nav>
                <a href="#" class="hide-desktop">
                    <img src="./images/ham.svg" alt="toggle menu" class="menu" id="menu">
                </a>

                <ul class="show-desktop hide-mobile" id="nav">
                    <li id="exit" class="exit-btn hide-desktop">
                        <img src="./images/exit.svg" alt="exit menu">
                    </li>

                    <li><a href="#">Home</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="left-content">
            <ul>
                <li>Home</li>
                <li>Profil</li>
            </ul>
        </div>

        <div class="right-content">
            <div class="new-post">
                
            </div>
            <div class="containEvent">

            </div>

        </div>
    </div>

    <script>
        let menu = document.getElementById('menu')
        let nav = document.getElementById('nav')
        let exit = document.getElementById('exit')

        menu.addEventListener('click', function(e){
            nav.classList.toggle('hide-mobile')
            e.preventDefault()
        })

        exit.addEventListener('click', function(e){
            nav.classList.add('hide-mobile')
            e.preventDefault()
        })
    </script>

</body>
</html>