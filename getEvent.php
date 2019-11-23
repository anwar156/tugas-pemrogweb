<?php

$conn = koneksi();

// row per page
$rowperpage = 3;

// counting total post
$allcount_query = "SELECT count(*) as allcount FROM event";
$allcount_result = mysqli_query($conn, $allcount_query);
$allcount_fetch = mysqli_fetch_array($allcount_result);
$allcount = $allcount_fetch['allcount'];

// Event query get data
$query = "SELECT event.event_id as idEvent, user.user_displayname as nameCreator, user.user_profile as imageUser, event.event_post as dateEvent, 
    event.event_tittle as tittleEvent, event.event_desc as descEvent, event.event_location as locationEvent,
    event.event_datetime as timeEvent, event.event_participant as participantEvent, event.event_image as imageEvent
    FROM event inner join user on event.event_author = user.user_id ORDER BY event.event_datetime DESC LIMIT 0, $rowperpage";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);

if(!isset($row['imageUser'])){
    $row['imageUser'] = "./images/Manaka.jpg"; 
}

?>

<div class="contain-event">
    <div class="head">
        <img src="<?php echo $row['imageUser']; ?>" alt="Event Created by <?php echo $row['nameCreator']; ?>">
        <label><?php echo $row['nameCreator']; ?></label><br>
        <label class="small"><?php echo $row['timeEvent']; ?></label>
    </div>
    <div class="tittle"><?php echo $row['tittleEvent']; ?></div>
    <?php

    if(isset($row['imageEvent'])){
        echo '<img src="'.$row['imageEvent'].'" alt="">';
    }

    ?>

    <div class="event-desc"><?php echo $row['descEvent']; ?></div>
    <div class="btn-box">
        <button class="btn btn-submit" name="Post" type="submit">Join Event</button>
    </div>
</div>
<!--
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
</div> -->