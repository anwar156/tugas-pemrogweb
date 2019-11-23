<?php

require_once "functions.php";

// Session tidak ada
session_start();
if(!isset($_SESSION["username"])){
    echo '<script>alert("Anda Harus Login Dulu!"); document.location="login.php";</script>';
}

if(isset($_GET['logout'])){
    destroy_session();
}

$value = array();
$value = show_user_attribute(koneksi());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Djogja Event</title>
    <link rel="stylesheet" href="./css/main-home.css">
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
                    <li><a href="?logout=true">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="left-content hide-mobile show-desktop">
            <ul>
                <li><img src="./images/Manaka.jpg" alt="Images profile"></li>
                <li class="name"><?php echo $value["user_displayname"]; ?></li>
                <li class="username"><?php echo $value["user_username"]; ?></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </div>

        <div class="middle-content">
            <div class="new-post">
                <form action="#" method="POST">
                    <h3>New Event</h3>
                    <table>
                        <tr>
                            <td>Tittle</td>
                            <td>: <input type="text" name="tittle"></td>
                        </tr>
                        <tr>
                            <td>Description your Event</td>
                            <td>: <input type="text" name="desc"></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>: <input type="text" name="location"></td>
                        </tr>
                        <tr>
                            <td>Event Date</td>
                            <td>: <input type="date" name="date" id="date"><input type="time" name="time" id="time"></td>
                        </tr>
                        <tr>
                            <td>Maximum Patricipations</td>
                            <td>: <input type="number" name="participant"></td>
                        </tr>
                    </table>
                    <div class="btn-box">
                        <button class="btn btn-submit" name="post" type="submit">Post</button>
                    </div>
                </form>
                
                <?php

                if(isset($_POST['post'])){
                    // Format time mysql
                    $time = $_POST['date']." ".$_POST['time'];
                    // echo $time;

                    $post = array(
                        "tittle" => $_POST['tittle'],
                        "desc" => $_POST['desc'],
                        "location" => $_POST['location'],
                        "desc" => $_POST['desc'],
                        "datetime" => $time,
                        "participant" => $_POST['participant']
                    );
                
                    insert_event(koneksi(), $post);
                }

                ?>
            </div>
            <div class="contain-event">
                <div class="head">
                    <img src="./images/Manaka.jpg" alt="Event Created">
                    <label>Nama Pembuat Event</label><br>
                    <label class="small">Waktu Membuat</label>
                </div>
                <div class="tittle">Tittle</div>
                <img src="./images/Manaka.jpg" alt="">
                <div class="event-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora similique, eos libero error ipsam corporis, ut consectetur amet aliquid tempore explicabo. Voluptatem obcaecati cupiditate maiores nam incidunt eum esse odio!</div>
                <div class="btn-box">
                    <button class="btn btn-submit" name="Post" type="submit">Join Event</button>
                </div>
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