<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/main-home.css">
    <title><?php echo $_GET['search']; ?></title>
</head>
<body>
    <div class="container-header">
        <header>
            
            <img src="./images/logo.svg" alt="Djogja Event" class="logo">

            <form action="./search.php" method="GET">
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
            <?php 

            require_once 'functions.php';

            $query = 'SELECT event.event_id as idEvent, user.user_displayname as nameCreator, user.user_profile as imageUser, event.event_post as datepost, 
            event.event_tittle as tittleEvent, event.event_desc as descEvent, event.event_location as locationEvent,
            event.event_datetime as timeEvent, event.event_participant as participantEvent, event.event_image as imageEvent
            FROM event inner join user on event.event_author = user.user_id WHERE event.event_tittle LIKE \'%'. $_GET['search']. '%\' ORDER BY datepost, timeEvent DESC';

            $result = mysqli_query(koneksi(), $query);
            
            while ($row = mysqli_fetch_array($result)){
                if(!isset($row['imageUser'])){
                    $row['imageUser'] = "./images/Manaka.jpg"; 
                }

                ?>
                <div class="contain-event">
                    <div class="head">
                        <img src="<?php echo $row['imageUser']; ?>" alt="Event Created by <?php echo $row['nameCreator']; ?>">
                        <label><?php echo $row['nameCreator']; ?></label><br>
                        <label class="small"><?php echo $row['datepost']; ?></label>
                    </div>
                    <div class="tittle"><?php echo $row['tittleEvent']; ?></div>
                    <?php

                    if(isset($row['imageEvent'])){
                        echo '<img src="'.$row['imageEvent'].'" alt="">';
                    }
                
                    ?>
                    <div class="event-desc"><?php echo $row['descEvent']; ?></div>
                    <div>Location : <?php echo $row['locationEvent']; ?></div>
                    <div>Event Date : <?php echo $row['timeEvent']; ?></div>
                    <div>Maximum participant : <?php echo $row['participantEvent']; ?></div>
                    <div class="event-desc"><?php echo $row['descEvent']; ?></div>
                    <form action="./join.php" method="GET">
                        <input type="hidden" name="idEvent" value="<?php echo $row['idEvent']; ?>">
                        <div class="btn-box">
                            <button class="btn btn-submit" name="Post" type="submit">Join Event</button>
                        </div>
                    </form>
                </div>

                <?php
            }

            ?>
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