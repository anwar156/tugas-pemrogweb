<?php

require_once "functions.php";

$conn = koneksi();

// row per page
$row = $_POST['row'];
$rowperpage = 3;

// counting total post
$allcount_query = "SELECT count(*) as allcount FROM event";
$allcount_result = mysqli_query($conn, $allcount_query);
$allcount_fetch = mysqli_fetch_array($allcount_result);
$allcount = $allcount_fetch['allcount'];

// Event query get data
$query = "SELECT event.event_id as idEvent, user.user_displayname as nameCreator, user.user_profile as imageUser, event.event_post as datepost, 
    event.event_tittle as tittleEvent, event.event_desc as descEvent, event.event_location as locationEvent,
    event.event_datetime as timeEvent, event.event_participant as participantEvent, event.event_image as imageEvent
    FROM event inner join user on event.event_author = user.user_id ORDER BY datepost, timeEvent DESC LIMIT $row, $rowperpage";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

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
            <input type="hidden" name="idEvent" value="<? echo $row['idEvent']; ?>">
            <div class="btn-box">
                <button class="btn btn-submit" name="Post" type="submit">Join Event</button>
            </div>
        </form>
    </div>

    <?php
}

?>