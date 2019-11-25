<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/main-home.css">
    <style>
    input {
        width: 100%;
    }
    </style>
    <title>Document</title>
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
                    <li><a href="./home.php?logout=true">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="left-content hide-mobile show-desktop">
            <ul>
                <li><img src="./images/Manaka.jpg" alt="Images profile"></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </div>

        <div class="middle-content">
            
            <div class="contain-event">
                <form action="./status.php" method="POST">
                    <h2>Join Event</h2>
                    <label>Masukkan Keterangan</label><br><br>
                    <input type="text" name="keterangan" placeholder="Masukkan Pesan">
                    <input type="hidden" name="idEvent" value="<?php echo $_GET['idEvent']; ?>">
                    <div class="btn-box">
                        <button class="btn btn-submit" name="JOIN" type="submit">Continue Join</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="right-content hide-mobile show-desktop">
            <p>UGM Yogyakarta Indonesia</p>
            <ul class="footer-links">
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
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